@php
    /*
    |--------------------------------------------------------------------------
    | Dashboard-managed dynamic form
    |--------------------------------------------------------------------------
    | Renders any Form configuration (heading / description / button / fields)
    | while keeping each call-site's existing visual design via class params.
    |
    | Params:
    |   $form            App\Models\Form (with visibleFields) — may be null
    |   $sign            current language sign (ar/en/fr)
    |   $serviceId       optional related service id
    |   $formId          DOM id
    |   $showCard        render white card + heading/description (default true)
    |   $showLabels      render <label> for each field (default true)
    |   *Class           styling overrides
    */

    $sign = $sign ?? 'ar';

    $form        = $form ?? null;
    $serviceId   = $serviceId ?? null;
    $formId      = $formId ?? 'dynamicForm';
    $showCard    = $showCard ?? true;
    $showLabels  = $showLabels ?? true;

    $wrapperClass    = $wrapperClass    ?? '';
    $cardClass       = $cardClass       ?? 'bg-white rounded-3xl shadow-xl border border-gray-100 p-6 relative';
    $headingClass    = $headingClass    ?? 'text-center text-2xl font-extrabold text-[#0b4f8f] mb-2';
    $descClass       = $descClass       ?? 'text-center text-gray-500 text-sm mb-6';
    $formClass       = $formClass       ?? 'space-y-4';
    $labelClass      = $labelClass      ?? 'block text-sm font-bold text-gray-700 mb-2';
    $inputClass      = $inputClass      ?? 'w-full rounded-xl border border-gray-200 px-4 py-3 text-sm focus:outline-none focus:border-[#1670d8]';
    $selectClass     = $selectClass     ?? $inputClass . ' bg-white';
    $textareaClass   = $textareaClass   ?? $inputClass;
    $buttonClass     = $buttonClass     ?? 'w-full px-10 py-3 rounded-xl bg-[#1670d8] text-white font-bold hover:bg-[#0b4f8f] transition';
    $buttonWrapClass = $buttonWrapClass ?? 'flex justify-center pt-2';
    $fullClass       = $fullClass       ?? '';

    $loc = function ($model, $base) use ($sign) {
        if (! $model) return '';
        return $model->{$base . '_' . $sign} ?: $model->{$base . '_ar'} ?: $model->{$base . '_en'} ?: '';
    };

    $heading     = $heading     ?? $loc($form, 'heading');
    $description = $description  ?? $loc($form, 'description');
    $buttonText  = $buttonText   ?? ($loc($form, 'button_text') ?: __('إرسال'));

    $fields = $form ? $form->visibleFields : collect();
@endphp

@if(! $form || $form->enabled)
<div id="{{ $formId }}" class="{{ $wrapperClass }}">
    <div class="{{ $showCard ? $cardClass : '' }}">

        @if($showCard && $heading)
            <h3 class="{{ $headingClass }}">{{ $heading }}</h3>
        @endif
        @if($showCard && $description)
            <p class="{{ $descClass }}">{{ $description }}</p>
        @endif

        @if(session('lead_success'))
            <div class="mb-4 rounded-xl bg-green-50 border border-green-200 text-green-700 px-4 py-3 text-sm text-center">
                {{ session('lead_success') }}
            </div>
        @endif
        @if(session('lead_error'))
            <div class="mb-4 rounded-xl bg-red-50 border border-red-200 text-red-700 px-4 py-3 text-sm text-center">
                {{ session('lead_error') }}
            </div>
        @endif
        @if($errors->any())
            <div class="mb-4 rounded-xl bg-red-50 border border-red-200 text-red-700 px-4 py-3 text-sm">
                <ul class="list-disc {{ $sign === 'en' ? 'pl-5' : 'pr-5' }}">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('front.lead.submit') }}" method="POST" class="{{ $formClass }}">
            @csrf
            <input type="hidden" name="form_key" value="{{ $form->key ?? 'homepage' }}">
            <input type="hidden" name="service_id" value="{{ $serviceId ?? ($form->service_id ?? '') }}">
            <input type="hidden" name="source_page" value="{{ url()->current() }}">

            @forelse($fields as $field)
                @php
                    $label       = $loc($field, 'label') ?: $field->name;
                    $placeholder = $loc($field, 'placeholder') ?: $label;
                    $req         = $field->required ? 'required' : '';
                    $wrap        = in_array($field->type, ['textarea']) ? $fullClass : '';
                @endphp

                <div class="{{ $wrap }}">
                    @if($showLabels)
                        <label class="{{ $labelClass }}">{{ $label }}@if($field->required) <span class="text-red-500">*</span>@endif</label>
                    @endif

                    @if($field->type === 'textarea')
                        <textarea name="{{ $field->name }}" rows="4" {{ $req }}
                            class="{{ $textareaClass }}"
                            placeholder="{{ $placeholder }}">{{ old($field->name) }}</textarea>

                    @elseif($field->type === 'select')
                        @php
                            $options = $field->optionList();
                            if (empty($options) && in_array($field->name, ['service', 'treatment']) && isset($services)) {
                                $options = $services->pluck('title_' . $sign)->filter()->values()->all();
                            }
                        @endphp
                        <select name="{{ $field->name }}" {{ $req }} class="{{ $selectClass }}">
                            @foreach($options as $opt)
                                <option value="{{ $opt }}" @selected(old($field->name) === $opt)>{{ $opt }}</option>
                            @endforeach
                        </select>

                    @elseif($field->type === 'date')
                        <input type="date" name="{{ $field->name }}" value="{{ old($field->name) }}" {{ $req }}
                            class="{{ $inputClass }}" placeholder="{{ $placeholder }}">

                    @else
                        <input type="{{ $field->type === 'email' ? 'email' : ($field->type === 'tel' ? 'tel' : 'text') }}"
                            name="{{ $field->name }}" value="{{ old($field->name) }}" {{ $req }}
                            @if($field->type === 'tel') dir="ltr" @endif
                            class="{{ $inputClass }}" placeholder="{{ $placeholder }}">
                    @endif
                </div>
            @empty
                {{-- No configured fields: render a minimal name + phone fallback --}}
                <div>
                    @if($showLabels)<label class="{{ $labelClass }}">{{ __('الاسم') }} <span class="text-red-500">*</span></label>@endif
                    <input type="text" name="name" required class="{{ $inputClass }}" placeholder="{{ __('الاسم') }}">
                </div>
                <div>
                    @if($showLabels)<label class="{{ $labelClass }}">{{ __('رقم الهاتف') }}</label>@endif
                    <input type="tel" name="phone" dir="ltr" class="{{ $inputClass }}" placeholder="{{ __('رقم الهاتف') }}">
                </div>
            @endforelse

            <div class="{{ $buttonWrapClass }}">
                <button type="submit" class="{{ $buttonClass }}">{{ $buttonText }}</button>
            </div>
        </form>
    </div>
</div>
@endif
