@if ($message = Session::get('success'))
<div class="alert-toast fixed bottom-0 right-0 m-8 w-5/6 md:w-full max-w-sm">
    <input type="checkbox" class="hidden" id="footertoast">

    <label class="close cursor-pointer flex items-start justify-between w-full p-5 bg-green-500 h-15 rounded shadow-lg text-white" title="close" for="footertoast">
        {{ $message }}

        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
        </svg>
    </label>
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert-toast fixed bottom-0 right-0 m-8 w-5/6 md:w-full max-w-sm">
    <input type="checkbox" class="hidden" id="footertoast">

    <label class="close cursor-pointer flex items-start justify-between w-full p-5 bg-red-500 h-15 rounded shadow-lg text-white" title="close" for="footertoast">
        {{ $message }}

        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
        </svg>
    </label>
</div>
@endif

@if ($message = Session::get('warning'))
<div class="alert-toast fixed bottom-0 right-0 m-8 w-5/6 md:w-full max-w-sm">
    <input type="checkbox" class="hidden" id="footertoast">

    <label class="close cursor-pointer flex items-start justify-between w-full p-5 bg-orange-500 h-15 rounded shadow-lg text-white" title="close" for="footertoast">
        {{ $message }}

        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
        </svg>
    </label>
</div>
@endif

@if ($message = Session::get('info'))
<div class="alert-toast fixed bottom-0 right-0 m-8 w-5/6 md:w-full max-w-sm">
    <input type="checkbox" class="hidden" id="footertoast">

    <label class="close cursor-pointer flex items-start justify-between w-full p-5 bg-blue-500 h-15 rounded shadow-lg text-white" title="close" for="footertoast">
        {{ $message }}

        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
        </svg>
    </label>
</div>
@endif
