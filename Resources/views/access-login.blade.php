<div class="relative overflow-hidden mb-8">
    <div class="overflow-hidden px-3 py-10 flex justify-center">
        <div class="w-full max-w-xs login-card">
            <h3 style="text-align: center"> - LOGIN - </h3>
            <div class="bg-white pt-6 mb-4">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                        Username
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="username" type="text" placeholder="Username">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input
                        class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        id="password" type="password" placeholder="******************">
                    <p class="text-red-500 text-xs italic">Please choose a password.</p>
                </div>
                <div class="flex items-center justify-between">
                    <button id='login-submit' type="submit" name="view" value="login"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        >
                        Login
                    </button>
                    <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800"
                        href="#">
                        Forgot Password?
                    </a>
                </div>

                <div style="text-align:center; margin-top:20px;">
                    <button id='register-submit' type="submit" name="view" value="register"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Create Account
                    </button>
                </div>
            </div>
            <p class="text-center text-gray-500 text-xs">
                &copy;2022. All rights reserved.
            </p>
        </div>
    </div>
</div>
