@extends('layouts.view')

@section('table_view')
    <div class="py-2 flex justify-left  text-sm">
        <a class="hover:bg-blue-400 group flex items-center rounded-md bg-blue-500 text-white text-sm font-medium pl-2 pr-3 py-2 shadow-sm" href="{{route('subjects.create')}}">
            <svg width="20" height="20" fill="currentColor" class="mr-2" aria-hidden="true">
                <path d="M10 5a1 1 0 0 1 1 1v3h3a1 1 0 1 1 0 2h-3v3a1 1 0 1 1-2 0v-3H6a1 1 0 1 1 0-2h3V6a1 1 0 0 1 1-1Z" />
            </svg>
            New Subject
        </a>
    </div>
    @if(!$subjects->isEmpty())
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Subject Name</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                </thead>
                @foreach($subjects as $subject)
                    <tr>
                        <td>{{$subject->id}}</td>
                        <td>{{$subject->title}}</td>
                        <td>{{$subject->category->title}}</td>
                        <td>{{$subject->is_active}}</td>
                        <td>{{$subject->created_at}}</td>
                        <td>
                            <table>
                                <tr>
                                    <td>
                                        <a class="btn btn-warning" href="{{route('subjects.show', [$subject->id])}}">Edit</a>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('subjects.destroy', [$subject->id]) }}">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger btn-icon">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            </table>
                        </td>

                    </tr>
                @endforeach

            </table>
        </div>
    @endif
@endsection

@section('pagination')
    {{$subjects->links()}}
@endsection
