@extends('layouts.admin.dashboard')

@section('title')
    {{ __('admin/pages.pages') }}
@endsection

@section('page_name')
    {{ __('admin/pages.pages') }}
@endsection

@section('breadcrumb')
    {{ __('admin/pages.pages') }}
@endsection
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>{{ __('admin/pages.title') }}</th>
                <th>{{ __('admin/pages.created_at') }}</th>
                <th colspan="3">{{ __('admin/pages.operation') }}</th>
            </tr>
        </thead>
        <tbody>
            <x-alert type="success" />
            <x-alert type="info" />
            <x-alert type="fail" />
            {{-- @if ($products->count()) --}}
            @forelse ($pages as $page)
                <tr>
                    @if (session()->has('locale') && session()->get('locale') == 'ar')
                    <td>{{ $page->title_ar }}</td>
                    @else
                    <td>{{ $page->title_en }}</td>
                    @endif
                    
                    <td>{{ $page->created_at->shortAbsoluteDiffForHumans() }}</td>

                    <td>
                        <a href="{{ route('admin.page-show', $page->slug) }}"
                            class="btn btn-sm btn-outline-info">{{ __('admin/pages.show') }}</a>
                    </td>
                    <td>
                        <form action="{{ route('admin.page.destroy', $page->slug) }}" method="post">
                            @csrf
                            {{-- Form Method Spoofing --}}
                            @method('delete')
                            <button type="submit"
                                class="btn btn-sm btn-outline-danger">{{ __('admin/pages.delete') }}</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">{{ __('admin/pages.no') }}</td>
                </tr>
            @endforelse
            {{-- @else

        @endif --}}
        </tbody>
    </table>
    {{ $pages->withQueryString()->appends(['search' => 1])->links() }}
@endsection
@section('css')
    <link href="{{ asset('css/dist/tagify.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('js')
    <script src="{{ asset('js/dist/tagify.js') }}"></script>
    <script src="{{ asset('js/dist/tagify.polyfills.min.js') }}"></script>
@endsection
{{-- @section('js')
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection --}}
