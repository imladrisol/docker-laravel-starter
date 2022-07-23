<div class="mb-6">
    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">
        Title
    </label>
    <input class="border border-gray-400 p-2 w-full" type="text" name="title" value="{{$subject->title ?? old('title')}}" id="title" required>
    @error('title')
    <p class="text-red-500 text-xs mt-2">{{$message}}</p>
    @enderror
</div>

<div class="mb-6">
    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="duration">
        Duration
    </label>
    <input class="border border-gray-400 p-2 w-full" type="text" name="duration" value="{{$subject->duration ?? old('duration')}}" id="duration" required>
    <span>Minutes</span>
    @error('duration')
    <p class="text-red-500 text-xs mt-2">{{$message}}</p>
    @enderror
</div>

<div class="mb-6">
    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="is_active">
        Active
    </label>
    <input type="hidden" value="0" name="is_active">
    <input type="checkbox" value="1" name="is_active" data-plugin="switchery" data-color="#1bb99a" {{ (isset($subject) ? old('is_active', $subject->getAttributes()['is_active']) : old('is_active')) ? 'checked' : ''}} >
</div>


<div class="mb-6">
    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="category_id">
        Categories
    </label>
    <select name="category_id">
        <option value="0">All</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}"

                    @if (isset($subject))
                        @if (old('category_id', $subject->getAttributes()['category_id']) == $category->id)
                            selected="selected"
                        @endif
                    @else
                        @if (old('category_id') == $category->id)
                            selected="selected"
                        @endif
                    @endif


            >{{ $category->title }}</option>
        @endforeach
    </select>
    @error('category_id')
    <p class="text-red-500 text-xs mt-2">{{$message}}</p>
    @enderror
</div>

