@props(['name', 'item', 'checked' => false])

<div class="flex mb-3">
    <input id="{{$name}}" name={{$name}} type="checkbox" value="{{$item->id}}" class="w-4 h-4 rounded-sm" @checked($checked)>
    <label for="{{$name}}" class="ms-2 text-sm text-left">{{$item->name}}</label>
</div>
