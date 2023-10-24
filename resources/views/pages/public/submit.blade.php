@extends('layouts.public.main')

@section('content')
    <div class="p-5">
        <h2 class="intro-y text-lg font-medium mb-3 mt-5">
            {{ $modulName }}
        </h2>
        <h3 class="intro-y text-md mb-10">
            {{ $topic->name }} > {{ $subtopic->name }}
        </h3>

        <form action="" method="POST">
            @csrf
            <input type="hidden" name="id_modul" value="{{ $idmodul }}">
            <input type="hidden" name="id_topic" value="{{ $topic->id }}">
            <input type="hidden" name="id_subtopic" value="{{ $subtopic->id }}">
            <input type="hidden" name="username" value="{{ session('cred')['username'] }}">
            <div class="mb-5">
                <label class="form-label">Pendapat 1</label>
                <textarea class="form-control" name="pendapat1" required>{{ old('pendapat1') }}</textarea>
                @if (session()->has('fail'))
                    @if (session('fail')['pendapat1'] == 'fail')
                        <label class="form-label w-full flex flex-col sm:flex-row">
                            <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500" style="color: red;">Sepertinya pendapat yang kamu berikan berbeda dengan sumber yang ada</span>
                        </label>
                    @endif
                @endif

                <input type="text" class="form-control mb-1" placeholder="Penulis: John Doe" name="penulis1" value="{{ old('penulis1') }}" required>
                @if (session()->has('fail'))
                    @if (session('fail')['penulis1'] == 'fail')
                        <label class="form-label w-full flex flex-col sm:flex-row">
                            <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500" style="color: red;">Sepertinya nama penulis yang anda berikan tidak valid</span>
                        </label>
                    @endif
                @endif

                <input type="number" class="form-control mb-1" placeholder="Tahun ditulis: 2022" name="tahun1" required value="{{ old('tahun1') }}">
                <input type="text" class="form-control" placeholder="Sumber: https://example.com" name="sumber1" required value="{{ old('sumber1') }}">
            </div>

            <div class="mb-5">
                <label class="form-label">Pendapat 2</label>
                <textarea class="form-control" name="pendapat2" required>{{ old('pendapat2') }}</textarea>
                @if (session()->has('fail'))
                    @if (session('fail')['pendapat2'] == 'fail')
                        <label class="form-label w-full flex flex-col sm:flex-row">
                            <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500" style="color: red;">Sepertinya pendapat yang kamu berikan berbeda dengan sumber yang ada</span>
                        </label>
                    @endif
                @endif

                <input type="text" class="form-control mb-1" placeholder="Penulis: John Doe" name="penulis2" required value="{{ old('penulis2') }}">
                @if (session()->has('fail'))
                    @if (session('fail')['penulis2'] == 'fail')
                        <label class="form-label w-full flex flex-col sm:flex-row">
                            <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500" style="color: red;">Sepertinya nama penulis yang anda berikan tidak valid</span>
                        </label>
                    @endif
                @endif

                <input type="number" class="form-control mb-1" placeholder="Tahun ditulis: 2022" name="tahun2" required value="{{ old('tahun2') }}">
                <input type="text" class="form-control" placeholder="Sumber: https://example.com" name="sumber2" required value="{{ old('sumber2') }}">
            </div>

            <div class="mb-5">
                <label class="form-label">Kesimpulan</label>

                <textarea class="form-control editor" name="kesimpulan">{{ old('kesimpulan') }}</textarea>
            </div>

            @if (isset($comment))
                <div class="mb-5">
                    <label class="form-label">Catatan Dari Admin</label>
                    <textarea class="form-control" cols="30" rows="10" readonly>{{ $comment }}</textarea>
                </div>
            @endif

            <button type="submit" class="btn btn-primary mt-5">Save</button>
        </form>
    </div>
@endsection

@section('script')
    <script src="/assets/dist/ckeditor/ckeditor.js"></script>
    <script>
        $(".editor").each(function() {
            const el = this;
            ClassicEditor.create(el).catch((error) => {
                console.error(error);
            });
        });
    </script>
@endsection
