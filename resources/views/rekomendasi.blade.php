<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-light mb-4">
        <div class="container">
            <a class="navbar-brand h1" href="#">Wes Makmur</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('jamu.index') }}">Home</a>
                    </li>                   
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="mb-4">
            <h3>Rekomendasi Jamu</h3>
        </div>
        <div class="card">
            <div class="card-header fw-semibold">
                Penemu jamu handal
            </div>
            <div class="card-body">
                <div class="row ">
                    <div class="col">
                        <div class="text-center mb-3">
                            <h4>Masukkan data</h4>
                        </div>
                        <form action="{{ route('jamu.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Keluhan</label>
                            <select name="keluhan" class="form-select" id="">
                                <option value="" disabled selected>-- Pilih keluhan --</option>
                                <option value="Keseleo dan kurang nafsu makan">Keseleo dan kurang nafsu makan</option>
                                <option value="Pegal-pegal">Pegal-pegal</option>
                                <option value="Darah tinggi dan gula darah">Darah tinggi dan gula darah</option>
                                <option value="Kram perut dan masuk angin">Kram perut dan masuk angin</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Tahun lahir</label>
                            <select name="tahun" class="form-select" id="">
                                <option value="" selected disabled>-- Pilih tahun lahir --</option>
                                @for($i = 1950; $i <= date('Y'); $i++)
                                    <option value="{{ $i }}" id="">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-primary w-25" value="Kirim">
                        </div>
                        </form>
                    </div>
                    <div class="col">
                        <div class="text-center mb-3">
                            <h4>Hasil</h4>
                        </div>
                        <div class="mb-3">
                            Keluhan : @isset($data)<span class="fw-semibold">{{ $data['keluhan'] }}</span>@endisset
                        </div>
                        <div class="mb-3">
                            Tahun lahir : @isset($data)<span class="fw-semibold">{{ $data['tahun'] }}</span>@endisset
                        </div>
                        <div class="mb-3">
                            Umur : @isset($data)<span class="fw-semibold">{{ $data['umur'] }}</span>@endisset
                        </div>
                        <div class="mb-3">
                            Nama jamu : @isset($data)<span class="fw-semibold">{{ $data['jamu'] }}</span>@endisset
                        </div>
                        <div class="mb-3">
                            Saran penggunaan : @isset($data)<span class="fw-semibold">{{ $data['saran'] }}</span>@endisset
                        </div>
                        <div class="mb-3">
                            Khasiat : @isset($data)<span class="fw-semibold">{{ $data['khasiat'] }}</span>@endisset
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
