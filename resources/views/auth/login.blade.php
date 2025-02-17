<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../src/output.css" rel="stylesheet">
    <link rel="stylesheet" href="../src/font.css">
</head>

<body class="bg-slate-950">
    <div class="flex h-screen justify-center items-center">
        <div class="p-1 rounded-2xl shadow-2xl">
            <form action="{{ route('login') }}">
                <div class="flex font_retro pb-10 justify-center">
                    <div>
                        <input name="email" type="text" placeholder="username"
                            class="placeholder:text-xs font_retro focus:placeholder:text-transparent text-white placeholder:text-gray-500 rounded-2xl bg-neutral-900 p-3">
                    </div>
                </div>
                <div class="flex font_retro justify-center">
                    <div>
                        <input name="password" type="password" placeholder="password"
                            class="focus:placeholder:text-transparent placeholder:text-xs font_retro text-white placeholder:text-gray-500 rounded-2xl bg-neutral-900 p-3">
                    </div>
                </div>
                <div class="font_retro flex items-center pt-1 ps-3">
                    <input type="checkbox" name="remember-me">
                    <span class="text-xs text-white">remember me</span>
                </div>
                <div
                    class="flex items-center justify-center mt-5 bg-blue-700 active:bg-blue-500 rounded-2xl text-white">
                    <button class="rounded-2xl p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="red" class="bi bi-google"
                            viewBox="0 0 16 16">
                            <path
                                d="M15.545 6.558a9.4 9.4 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.7 7.7 0 0 1 5.352 2.082l-2.284 2.284A4.35 4.35 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.8 4.8 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.7 3.7 0 0 0 1.599-2.431H8v-3.08z" />
                        </svg>
                    </button>
                    <span>Login with Google</span>
                </div>
                <div class="flex justify-center pt-5">
                    <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="white"
                            class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z" />
                            <path fill-rule="evenodd"
                                d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                        </svg></button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>