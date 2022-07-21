<div class="mb-6">
    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">
        Title
    </label>
    <input class="border border-gray-400 p-2 w-full" type="text" name="title" value="{{$category->title ?? old('title')}}" id="title" required>
    @error('title')
    <p class="text-red-500 text-xs mt-2">{{$message}}</p>
    @enderror
</div>

<div class="mb-6">
    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="is_active">
        Active
    </label>
    <input type="hidden" value="0" name="is_active">
    <input type="checkbox" value="1" name="is_active" data-plugin="switchery" data-color="#1bb99a" {{ (isset($category) ? old('is_active', $category->getAttributes()['is_active']) : old('is_active')) ? 'checked' : ''}} >
</div>
