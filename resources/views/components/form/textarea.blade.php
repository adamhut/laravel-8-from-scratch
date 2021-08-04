@props([
    'name'
])

<x-form.field>
    <x-form.label name="{{$name}}"></x-form.label>

    <textarea class="border broder-gray-400 p-2 w-full rounded" name="{{$name}}" id="{{$name}}"
        required>{{ old($name) }}</textarea>

    <x-form.error :name="$name"></x-form.error>
</x-form.field>