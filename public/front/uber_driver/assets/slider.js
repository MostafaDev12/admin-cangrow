const displacementSlider = function (opts) {
  let vertex = `
    varying vec2 vUv;
    void main() {
      vUv = uv;
      gl_Position = projectionMatrix * modelViewMatrix * vec4(position, 1.0);
    }
  `;

  let fragment = `
    varying vec2 vUv;
    uniform sampler2D currentImage;
    uniform sampler2D nextImage;
    uniform float dispFactor;
    void main() {
      vec2 uv = vUv;
      vec4 orig1 = texture2D(currentImage, uv);
      vec4 orig2 = texture2D(nextImage, uv);

      float intensity = 0.3;

      vec4 _currentImage = texture2D(currentImage, vec2(uv.x, uv.y + dispFactor * orig2.r * intensity));
      vec4 _nextImage    = texture2D(nextImage, vec2(uv.x, uv.y + (1.0 - dispFactor) * orig1.r * intensity));

      vec4 finalTexture = mix(_currentImage, _nextImage, dispFactor);
      gl_FragColor = finalTexture;
    }
  `;

  let images = opts.images;
  let sliderImages = [];
  let parent = document.getElementById("threejs-container");

  if (!parent) {
    parent = opts.parent;
  }

  let renderWidth, renderHeight;
  let scene, camera, object, mat;
  let isMobile = window.innerWidth < 768;

  function initRenderer() {
    // احصل على أبعاد الحاوية الحالية
    renderWidth = parent.clientWidth;
    renderHeight = parent.clientHeight;

    // أبعاد مختلفة للموبايل والديسكتوب
    if (isMobile) {
      renderHeight = Math.min(renderHeight * 0.6, 400);
    } else {
      renderHeight = Math.min(renderHeight * 0.8, 600);
    }

    const renderer = new THREE.WebGLRenderer({
      antialias: true,
      alpha: true,
    });

    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    renderer.setClearColor(0x000000, 0);
    renderer.setSize(renderWidth, renderHeight);
    parent.appendChild(renderer.domElement);

    return renderer;
  }

  let renderer = initRenderer();

  // دالة لإنشاء geometry بالحجم المناسب لكل شاشة
  function getCoverGeometry(img, containerW, containerH) {
    const imageAspect = img.image.width / img.image.height;
    const containerAspect = containerW / containerH;

    // عوامل تصغير مختلفة حسب حجم الشاشة
    let scaleFactor;
    if (window.innerWidth < 768) {
      // موبايل
      scaleFactor = 0.9;
    } else if (window.innerWidth < 1024) {
      // تابلت
      scaleFactor = 0.8;
    } else {
      // ديسكتوب
      scaleFactor = 0.7;
    }

    let w, h;

    if (containerAspect > imageAspect) {
      w = containerW * scaleFactor;
      h = (containerW * scaleFactor) / imageAspect;
    } else {
      h = containerH * scaleFactor;
      w = containerH * scaleFactor * imageAspect;
    }

    // تأكد من أن الأبعاد لا تتجاوز الحاوية
    w = Math.min(w, containerW * 0.95);
    h = Math.min(h, containerH * 0.95);

    return new THREE.PlaneBufferGeometry(w, h, 1);
  }

  function initScene() {
    scene = new THREE.Scene();

    // Orthographic camera
    camera = new THREE.OrthographicCamera(
      renderWidth / -2,
      renderWidth / 2,
      renderHeight / 2,
      renderHeight / -2,
      0.1,
      1000
    );
    camera.position.z = 10;

    mat = new THREE.ShaderMaterial({
      uniforms: {
        dispFactor: { type: "f", value: 0.0 },
        currentImage: { type: "t", value: sliderImages[0] },
        nextImage: { type: "t", value: sliderImages[1] },
      },
      vertexShader: vertex,
      fragmentShader: fragment,
      transparent: true,
      opacity: 1.0,
    });

    let geometry = getCoverGeometry(sliderImages[0], renderWidth, renderHeight);
    object = new THREE.Mesh(geometry, mat);

    // ضبط الموضع حسب حجم الشاشة
    if (isMobile) {
      object.position.y = -renderHeight * 0.1; // حرك لأعلى قليلاً في الموبايل
    } else {
      object.position.x = renderWidth * 0.05; // حرك لليمين في الديسكتوب
    }

    scene.add(object);

    addEvents();
    animate();
  }

  let loader = new THREE.TextureLoader();
  let loadedCount = 0;

  images.forEach((img, i) => {
    loader.load(img.getAttribute("src") + "?v=" + Date.now(), (texture) => {
      texture.magFilter = texture.minFilter = THREE.LinearFilter;
      texture.anisotropy = renderer.capabilities.getMaxAnisotropy();
      sliderImages[i] = texture;
      loadedCount++;

      if (loadedCount === images.length) {
        initScene();
      }
    });
  });

  function addEvents() {
    let pagButtons = Array.from(
      document.getElementById("pagination").querySelectorAll("button")
    );
    let isAnimating = false;

    pagButtons.forEach((el) => {
      el.addEventListener("click", function () {
        if (!isAnimating && !this.classList.contains("active")) {
          isAnimating = true;

          const currentActive = document
            .getElementById("pagination")
            .querySelector(".active");
          if (currentActive) {
            currentActive.classList.remove("active", "opacity-100");
            currentActive.classList.add("opacity-20");
          }

          this.classList.add("active", "opacity-100");
          this.classList.remove("opacity-20");

          let slideId = parseInt(this.dataset.slide, 10);

          mat.uniforms.nextImage.value = sliderImages[slideId];
          mat.uniforms.nextImage.needsUpdate = true;

          gsap.to(mat.uniforms.dispFactor, {
            duration: 1,
            value: 1,
            ease: "expo.inOut",
            onComplete: function () {
              mat.uniforms.currentImage.value = sliderImages[slideId];
              mat.uniforms.currentImage.needsUpdate = true;
              mat.uniforms.dispFactor.value = 0.0;
              isAnimating = false;

              // تحديث geometry حسب الصورة الجديدة
              let currentTex = mat.uniforms.currentImage.value;
              let newGeometry = getCoverGeometry(
                currentTex,
                renderWidth,
                renderHeight
              );
              object.geometry.dispose();
              object.geometry = newGeometry;
            },
          });

          // تحديث النصوص
          let slideTitleEl = document.getElementById("slide-title");
          let slideStatusEl = document.getElementById("slide-status");

          if (slideTitleEl && slideStatusEl) {
            let nextSlideTitle = document.querySelector(
              `[data-slide-title="${slideId}"]`
            ).innerHTML;
            let nextSlideStatus = document.querySelector(
              `[data-slide-status="${slideId}"]`
            ).innerHTML;

            gsap.fromTo(
              slideTitleEl,
              { autoAlpha: 1, y: 0 },
              {
                duration: 0.5,
                autoAlpha: 0,
                y: 20,
                ease: "expo.in",
                onComplete: function () {
                  slideTitleEl.innerHTML = nextSlideTitle;
                  gsap.to(slideTitleEl, {
                    duration: 0.5,
                    autoAlpha: 1,
                    y: 0,
                  });
                },
              }
            );

            gsap.fromTo(
              slideStatusEl,
              { autoAlpha: 1, y: 0 },
              {
                duration: 0.5,
                autoAlpha: 0,
                y: 20,
                ease: "expo.in",
                onComplete: function () {
                  slideStatusEl.innerHTML = nextSlideStatus;
                  gsap.to(slideStatusEl, {
                    duration: 0.5,
                    autoAlpha: 1,
                    y: 0,
                    delay: 0.1,
                  });
                },
              }
            );
          }
        }
      });
    });
  }

  // دالة لإعادة الحجم عند تغيير حجم النافذة
  function handleResize() {
    isMobile = window.innerWidth < 768;

    const newWidth = parent.clientWidth;
    const newHeight = isMobile
      ? Math.min(parent.clientHeight * 0.8, 600)
      : Math.min(parent.clientHeight * 0.8, 600);

    renderer.setSize(newWidth, newHeight);
    renderWidth = newWidth;
    renderHeight = newHeight;

    if (camera) {
      camera.left = newWidth / -2;
      camera.right = newWidth / 2;
      camera.top = newHeight / 2;
      camera.bottom = newHeight / -2;
      camera.updateProjectionMatrix();
    }

    if (object && mat) {
      let currentTex = mat.uniforms.currentImage.value;
      let newGeometry = getCoverGeometry(currentTex, newWidth, newHeight);

      object.geometry.dispose();
      object.geometry = newGeometry;

      // إعادة ضبط الموضع
      if (isMobile) {
        object.position.x = newWidth * 0.05;
        object.position.x = 0; // هذا يلغي السطر السابق
      } else {
        object.position.x = newWidth * 0.05;
        object.position.y = 0;
      }
    }
  }

  // إضافة event listener للـ resize مع debounce
  let resizeTimeout;
  window.addEventListener("resize", function () {
    clearTimeout(resizeTimeout);
    resizeTimeout = setTimeout(handleResize, 250);
  });

  function animate() {
    requestAnimationFrame(animate);
    if (renderer && scene && camera) {
      renderer.render(scene, camera);
    }
  }
};

// تهيئة السلايدر
imagesLoaded(document.querySelectorAll("#slider img"), () => {
  document.body.classList.remove("loading");

  const sliderElement = document.getElementById("slider");
  const imgs = Array.from(sliderElement.querySelectorAll("img"));

  new displacementSlider({
    parent: sliderElement,
    images: imgs,
  });
});
