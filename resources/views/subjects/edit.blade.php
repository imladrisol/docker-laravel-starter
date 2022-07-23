@extends('layouts.view')

@section('table_view')

    <form method="post" action="{{route('subjects.update', ['subject' => $subject->id])}}" class="mt-10">
        @csrf
        @method('PUT')

        @include('subjects.form')

        <div class="mb-6">
            <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                Save
            </button>
        </div>
    </form>
    <div class="py-2 flex justify-left  text-sm">
        <a class="hover:bg-green-400 group flex items-center rounded-md bg-green-500 text-white text-sm font-medium pl-2 pr-3 py-2 shadow-sm" href="{{route('subjects.index')}}">
            Back
        </a>
    </div>
@endsection

