    <div class="relative">
        @if('textarea' !== $type)
        @if($formRef)
        <button class="absolute top-0 right-0 flex h-full items-center pr-2"
            @click="$refs['input-{{$name}}'].value = ''; $refs['$formRef'].submit();"
            type="button"
            >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 text-slate-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button>
        @endif
            <input
                x-ref="input-{{$name}}"
                type="{{ $type }}"
                placeholder="{{ $placeholder }}"
                name="{{ $name }}"
                value="{{ old($name, $value) }}"
                id="{{ $name }}"
            @class(['w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-1 placeholder:text-slate-400 focus:ring-2',
                'pr-8' => $formRef,
                'ring-slate-300' => !$errors->has($name),
                'ring-red-300' => $errors->has($name),
        ])
    />
        @else
            <textarea
                name="{{ $name }}"
                id="{{ $name }}"
                @class(['w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-1 placeholder:text-slate-400 focus:ring-2',
                'pr-8' => $formRef,
                'ring-slate-300' => !$errors->has($name),
                'ring-red-300' => $errors->has($name),
        ])
                >
                {{old($name, $value)}}
            </textarea>

        @endif




        @error($name)
            <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
        @enderror
    </div>
