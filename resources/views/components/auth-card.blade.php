
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100" style="height: 100vh; width: 100vw; display: flex; align-items: center;">

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg" style="margin: auto; display: flex; justify-content: center; align-items: center; padding-inline: 30px; border-radius: 7px; box-shadow: 0px 5px 10px 2px rgba(34, 60, 80, 0.2); padding-bottom: 20px;">
        <!-- Session Status -->
                    
                    <!-- Validation Errors -->
                    
                    
                    <form method="POST" action="{{route('login')}}">
                    	<h1 style="text-align: center; padding-block:20px;">{{__('Вход в систему')}}</h1>
                        <!-- <input type="hidden" name="_token" value="pxETfQFwql1fxmtsO3QOhNNnGq1PyHgdnyKuD8G8"> -->
                        @csrf()
                        <!-- Email Address -->
                        <div>
                            
            
                            <input  class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" id="email" type="text" name="email" required="required" autofocus="autofocus" placeholder="{{__('Email')}}" style="width: 100%; height: 30px; margin-bottom: 5px;"> 
                        </div>
            
                        <!-- Password -->
                        <div class="mt-4">
                            
            
                            <input  class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" id="password" type="password" name="password" required="required" autocomplete="current-password" placeholder="{{__('Password')}}" style="width: 100%; height: 30px; margin-bottom: 5px;"> 
                        </div>
            
                        <!-- Remember Me -->
                        <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember"> 
                                <span class="ml-2 text-sm text-gray-600">Remember me</span>
                            </label>
                        </div>
            
                        <div class="flex items-center justify-end mt-4">
                                                
                            
                            <button type="submit" class="" style="margin-inline: auto; display: flex; text-align: center; padding-inline: 10px; padding-block:10px; border-radius: 5px; border: 1px solid #dadada; margin-top: 10px; cursor: pointer;"> 
                Log in
            </button>
                        </div>
                    </form>
    </div>

 
</div>
