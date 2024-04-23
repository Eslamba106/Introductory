@extends('layouts.admin.dashboard')

@section('title')
    {{ __('admin/moderator.moderators') }}
@endsection

@section('page_name')
    {{ __('admin/moderator.moderators') }}
@endsection

@section('breadcrumb')
    {{ __('admin/moderator.moderators') }}
@endsection
@section('content')
<div class="m-2">
    <a href="{{ route('admin.moderator.create') }}" class="btn btn-sm btn-outline-primary mr-2">{{ __('admin/moderator.add_moderator') }}</a>
</div>
    <table class="table">
        <thead>
            <tr>
                <th>{{ __('admin/moderator.name') }}</th>
                <th>{{ __('admin/moderator.email') }}</th>
                <th>{{ __('admin/moderator.created_at') }}</th>
                <th colspan="3">{{ __('admin/pages.operation') }}</th>
            </tr>
        </thead>
        <tbody>
            <x-alert type="success" />
            <x-alert type="info" />
            <x-alert type="fail" />
            {{-- @if ($products->count()) --}}
            @forelse ($moderators as $moderator)
                <tr>
                    <td>{{ $moderator->name }}</td>
                    <td>{{ $moderator->email }}</td>
                    <td>{{ $moderator->created_at->shortAbsoluteDiffForHumans() }}</td>

                    <td>
                        <a href="{{ route('admin.moderator.edit', $moderator->id) }}"
                            class="btn btn-sm btn-outline-success">{{ __('admin/moderator.edit_moderator') }}</a>
                    </td>
                    {{-- <td>
                        <a href="{{ route('admin.moderator.show', $moderator->id) }}"
                            class="btn btn-sm btn-outline-info">{{ __('admin/moderator.show_moderator') }}</a>
                    </td> --}}
                    <td>
                        <form action="{{ route('admin.moderator.destroy', $moderator->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit"
                                class="btn btn-sm btn-outline-danger">{{ __('admin/pages.delete') }}
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">{{ __('admin/moderator.no') }}</td>
                </tr>
            @endforelse
            {{-- @else

        @endif --}}
        </tbody>
    </table>
    {{ $moderators->withQueryString()->appends(['search' => 1])->links() }}
@endsection
