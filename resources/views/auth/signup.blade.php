<x-layout-simple :title="$pagetitle">

    <!-- Sayfanın düzenini belirleyen layout (basit şablon) -->

    <!--
      Not: Bu örnekte TailwindCSS kullanıldığı için,
      HTML kök elemanında (html, body) aşağıdaki sınıfların eklenmesi önerilir:
      <html class="h-full bg-gray-900">
      <body class="h-full">
    -->

    <!-- Ortalanmış form kutusu için container -->
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">

        <!-- Logo ve başlık alanı -->
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
             <a href="/">
            <!-- Şirket logosu -->
            <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                 alt="Your Company"
                 class="mx-auto h-10 w-auto" />
             </a>

            <!-- Başlık -->
            <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-black">
                Create Your Account
            </h2>
        </div>

        <!-- Form alanı -->
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form action="/signup" method="POST" class="space-y-6">
                @csrf <!-- Laravel CSRF koruması -->

                <!-- Kullanıcı Adı -->
                <div>
                    <label for="name" class="block text-sm/6 font-medium text-gray-900">Full Name</label>
                    <div class="mt-2">
                        <input id="name" type="text" name="name" required value='{{old('name')}}'
                            class="border border-gray-300 block w-full rounded-md bg-white px-3 py-1.5
                                   text-base text-gray-900 placeholder:text-gray-500
                                   focus:outline-2 focus:outline-indigo-500 sm:text-sm/6" />
                    </div>
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
                    <div class="mt-2">
                        <input id="email" type="email" name="email" required  value='{{old('email')}}' autocomplete="email"
                            class="border border-gray-300 block w-full rounded-md bg-white px-3 py-1.5
                                   text-base text-gray-900 placeholder:text-gray-500
                                   focus:outline-2 focus:outline-indigo-500 sm:text-sm/6" />
                    </div>
                </div>

                <!-- Şifre -->
                <div>
                    <label for="password" class="block text-sm/6 font-medium text-black">Password</label>
                    <div class="mt-2">
                        <input id="password" type="password" name="password" required
                        autocomplete="current-password"
                            class="border border-gray-300 block w-full rounded-md bg-white px-3 py-1.5
                                text-base text-gray-900 placeholder:text-gray-900
                                focus:outline-2 focus:outline-indigo-500 sm:text-sm/6" />
                    </div>
                </div>

                <!-- Şifre Tekrar -->
                <div>
                    <label for="password_confirmation" class="block text-sm/6 font-medium text-black">Password Confirm</label>
                    <div class="mt-2">
                        <input id="password_confirmation" type="password" name="password_confirmation" required
                            autocomplete="current-password"
                            class="border border-gray-300 block w-full rounded-md bg-white px-3 py-1.5
                                   text-base text-gray-900 placeholder:text-gray-900
                                   focus:outline-2 focus:outline-indigo-500 sm:text-sm/6" />
                    </div>
                </div>


                <!-- Gönder Butonu -->
                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-500 px-3 py-1.5
                               text-sm/6 font-semibold text-white hover:bg-indigo-400
                               focus-visible:outline-2 focus-visible:outline-indigo-600">
                        Create Account
                    </button>
                </div>
                 @if($errors->any())

                 @foreach ($errors->all() as $error)
                   <div class="text-red-500 text-sm">
                     {{$error}}

                   </div>
                 @endforeach
                   @endif

            </form>
        </div>
    </div>

</x-layout-simple>
