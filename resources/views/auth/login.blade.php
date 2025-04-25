 <x-layout>


     <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
         <div class="sm:mx-auto sm:w-full sm:max-w-sm">
         
             <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Login in to your account
             </h2>
         </div>

         <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
             <form class="space-y-6" method="POST" action="{{ route('login') }}">
                 @csrf
                 <div>
                     <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
                     <div class="mt-2">
                         <input type="email" name="email" id="email" autocomplete="email" required value="{{ old('email') }}"
                             class=" peer  block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                         @error('email')
                         <!-- Server-side error -->
                @error('email')
                    <span id="email-error" class="mt-2 block text-sm text-red-500">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                         @enderror
                     </div>
                 </div>

                 <div>
                     <div class="flex items-center justify-between">
                         <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                         <div class="text-sm">
                         @if (Route::has('password.request'))
                             <a href="{{ route('password.request') }}" class=" font-semibold text-indigo-600 hover:text-indigo-500">Forgot
                                 password?</a>
                                 @endif
                         </div>
                     </div>
                     <div class="mt-2">
                         <input type="password" name="password" id="password" autocomplete="current-password" required
                             class=" peer  block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                             @error('password')
                         <span
                             class="mt-2 hidden text-sm text-red-500 peer-[&:not(:placeholder-shown):not(:focus):invalid]:block">
                             <strong>{{ $message }}</strong>
                         </span>
                         @enderror
                            </div>
                 </div>

                 <div>
                     <button type="submit"
                         class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Login
                         </button>
                 </div>
             </form>

             <p class="mt-10 text-center text-sm/6 text-gray-500">
                 Not a member?
                 <a href="{{ route('register') }}" class="font-semibold text-indigo-600 hover:text-indigo-500">Start a 14 day free trial</a>
             </p>
         </div>
     </div>



 </x-layout>