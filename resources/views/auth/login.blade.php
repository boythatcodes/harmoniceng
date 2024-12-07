<html lang="en" data-theme="dark">

<head>
    <meta charset="utf-8">
    <link rel="icon" href="/favicon.ico">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="theme-color" content="#000000">
    <meta name="description" content="A free admin dashboard template using Daisy UI and React js.">
    <link rel="apple-touch-icon" href="/logo192.png">
    <link rel="manifest" href="/manifest.json">
    <title>Daisy UI Admin Dashboard Template - DashWind</title>
    <meta name="description"
        content="Get a customizable and easily-themed admin dashboard template using Daisy UI and React js. Boost your productivity with pre-configured redux toolkit and other libraries.">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.13/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="">
    <div id="root">
        <div class="">
            <div class="min-h-screen bg-base-200 flex items-center">
                <div class="card mx-auto w-full max-w-5xl  shadow-xl">
                    <div class="grid  md:grid-cols-2 grid-cols-1  bg-base-100 rounded-xl">
                        <div class="">
                            <div class="hero min-h-full rounded-l-xl bg-base-200">
                                <div class="hero-content py-12">
                                    <div class="max-w-md">
                                        <h1 class="text-3xl text-center font-bold "><img src="/harmonic_eng.png"
                                                class="w-28 inline-block mr-2 mask mask-circle"
                                                alt="dashwind-logo"> <div style="max-width: 300px;" class="pt-7">Harmonic Engineering Group</div></h1>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="py-24 px-10">
                            <h2 class="text-2xl font-semibold mb-2 text-center">Login</h2>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="mb-4">
                                    <div class="form-control w-full mt-4"><label class="label"><span
                                                class="label-text text-base-content undefined">Email
                                                Id</span></label><input id="email" type="email"
                                            class="input  input-bordered w-full " value="" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="text-red-500" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-control w-full mt-4"><label class="label"><span
                                                class="label-text text-base-content undefined">Password</span></label><input
                                            id="password" type="password" placeholder="" class="input  input-bordered w-full " name="password" required autocomplete="current-password"
                                            value="">
                                        @error('password')
                                        <span class="itext-red-500" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- <div class="text-right text-primary"><a href="/forgot-password"><span
                                            class="text-sm  inline-block  hover:text-primary hover:underline hover:cursor-pointer transition duration-200">Forgot
                                            Password?</span></a></div> -->
                                <p class="text-center  text-error mt-8"></p><button type="submit"
                                    class="btn mt-2 w-full btn-primary">Login</button>
                                <div class="text-center mt-4">Don't have an account yet? <br> <span class="text-sm text-gray-500"> Ask an admin to create it for you.</span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
