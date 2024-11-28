<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de reservas - LOGIN</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css?v=3.2.0">
    <script data-cfasync="false" nonce="61c3344f-58af-4c02-b3c2-87faf5bc2bba">
        try {
            (function(w, d) {
                ! function(ne, nf, ng, nh) {
                    if (ne.zaraz) console.error("zaraz is loaded twice");
                    else {
                        ne[ng] = ne[ng] || {};
                        ne[ng].executed = [];
                        ne.zaraz = {
                            deferred: [],
                            listeners: []
                        };
                        ne.zaraz._v = "5823";
                        ne.zaraz._n = "61c3344f-58af-4c02-b3c2-87faf5bc2bba";
                        ne.zaraz.q = [];
                        ne.zaraz._f = function(ni) {
                            return async function() {
                                var nj = Array.prototype.slice.call(arguments);
                                ne.zaraz.q.push({
                                    m: ni,
                                    a: nj
                                })
                            }
                        };
                        for (const nk of ["track", "set", "debug"]) ne.zaraz[nk] = ne.zaraz._f(nk);
                        ne.zaraz.init = () => {
                            var nl = nf.getElementsByTagName(nh)[0],
                                nm = nf.createElement(nh),
                                nn = nf.getElementsByTagName("title")[0];
                            nn && (ne[ng].t = nf.getElementsByTagName("title")[0].text);
                            ne[ng].x = Math.random();
                            ne[ng].w = ne.screen.width;
                            ne[ng].h = ne.screen.height;
                            ne[ng].j = ne.innerHeight;
                            ne[ng].e = ne.innerWidth;
                            ne[ng].l = ne.location.href;
                            ne[ng].r = nf.referrer;
                            ne[ng].k = ne.screen.colorDepth;
                            ne[ng].n = nf.characterSet;
                            ne[ng].o = (new Date).getTimezoneOffset();
                            if (ne.dataLayer)
                                for (const no of Object.entries(Object.entries(dataLayer).reduce(((np, nq) => ({
                                        ...np[1],
                                        ...nq[1]
                                    })), {}))) zaraz.set(no[0], no[1], {
                                    scope: "page"
                                });
                            ne[ng].q = [];
                            for (; ne.zaraz.q.length;) {
                                const nr = ne.zaraz.q.shift();
                                ne[ng].q.push(nr)
                            }
                            nm.defer = !0;
                            for (const ns of [localStorage, sessionStorage]) Object.keys(ns || {}).filter((nu => nu.startsWith("_zaraz_"))).forEach((nt => {
                                try {
                                    ne[ng]["z_" + nt.slice(7)] = JSON.parse(ns.getItem(nt))
                                } catch {
                                    ne[ng]["z_" + nt.slice(7)] = ns.getItem(nt)
                                }
                            }));
                            nm.referrerPolicy = "origin";
                            nm.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(ne[ng])));
                            nl.parentNode.insertBefore(nm, nl)
                        };
                        ["complete", "interactive"].includes(nf.readyState) ? zaraz.init() : ne.addEventListener("DOMContentLoaded", zaraz.init)
                    }
                }(w, d, "zarazData", "script");
                window.zaraz._p = async br => new Promise((bs => {
                    if (br) {
                        br.e && br.e.forEach((bt => {
                            try {
                                const bu = d.querySelector("script[nonce]"),
                                    bv = bu?.nonce || bu?.getAttribute("nonce"),
                                    bw = d.createElement("script");
                                bv && (bw.nonce = bv);
                                bw.innerHTML = bt;
                                bw.onload = () => {
                                    d.head.removeChild(bw)
                                };
                                d.head.appendChild(bw)
                            } catch (bx) {
                                console.error(`Error executing script: ${bt}\n`, bx)
                            }
                        }));
                        Promise.allSettled((br.f || []).map((by => fetch(by[0], by[1]))))
                    }
                    bs()
                }));
                zaraz._p({
                    "e": ["(function(w,d){})(window,document)"]
                });
            })(window, document)
        } catch (e) {
            throw fetch("/cdn-cgi/zaraz/t"), e;
        };
    </script>
</head>

<body class="hold-transition login-page" style="background-image: url('{{url('assets/img/login_back.jpg')}}'); 
background-repeat: no-repeat; background-size: 100vw 100vh; background-attachment: fixed">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="../../index2.html" class="h1"><b>Dr.</b> Luis Miguel </a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Inicio de sesion</p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email" class="col-form-label text-md-end">{{ __('Correo: ') }}</label>

                                <div class="">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="password" class="col-form-label text-md-end">Contraseña</label>

                                <div class="">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Recuerdame') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Iniciar') }}
                            </button>
                        </div>
                    </div>
                </form>

                <br>

                <p class="mb-0">
                    <a href="{{url('register')}}" class="text-center">¿No tienes cuenta? Registrate</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js?v=3.2.0"></script>
</body>

</html>