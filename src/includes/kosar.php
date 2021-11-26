<main class="container">
    
    <link rel="stylesheet" type="text/css" href="/css/kosar.css">
    <link rel="stylesheet" type="text/css" href="/css/custom.css">
    <div class="row">
        <div class="col-12 col-lg-8">
            <h1 class="mt-5 mb-3">Kosár tartalma</h1>
                <div class="row my-3">
                    <div class="col-3">
                        <img src="/img/phone1.jpg" class="img-fluid">
                    </div>
                    <div class="col-9">
                        <span class="fs-4 text-secondary">Név</span>
                        <div class="mt-3 fs-5 d-flex justify-content-between">
                            <span class="amount">10 db</span>
                            <span class="text-danger">100 Ft</span>
                        </div>
                        <div class="text-end">
                            <span role="button" class="text-danger"><u>eltávolít</u></span>
                        </div>
                    </div>
                </div>
        </div>

        <div class="col-12 col-lg-4">
            <h2 class="mt-5 mb-3">Összegzés</h2>
            <div class="row py-1 border-bottom border-2">
                <span class="col-6">Összeg</span>
                <span id="sumValue" class="text-end col-6">100 Ft</span>
            </div>
            <div class="row py-1 border-bottom border-2">
                <span class="col-6">Szállítási költség</span>
                <span class="text-end col-6">100 Ft</span>
            </div>
            <div class="row py-1 border-bottom border-2">
                <span id="codeName" class="col-6"></span>
                <span id="codeValue" class="text-end col-6">200 Ft</span>
            </div>
            <span class="fs-3"><strong>Végösszeg:</strong></span>
            <span id="finalSumValue" class="fs-4 text-danger"><strong>200 Ft</strong></span>
            <hr>
            <form>
            <div class="my-3">
                <label for="kuponkod" class="form-label">Kuponkód</label>
                <input type="text" class="form-control" id="kuponkod" aria-describedby="kuponkod">
                <span id="errorMsg" class="invalid-feedback"></span>
            </div>
                <button id="kupon" type="button" class="btn btn-primary mb-3">Kód használata</button>
            </form>
            <hr>
            <a href="/fizetes" class="btn btn-success btn-lg my-3">Tovább a fizetéshez</a>
        </div>
    </div>
</main>