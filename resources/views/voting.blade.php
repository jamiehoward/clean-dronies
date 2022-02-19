@extends('layouts.app')

@section('content')
<div class="grid gap-12">
    <div class="md:w-1/2 mx-auto mt-16 rounded-md px-4 text-center grid gap-6 mb-8">
        <div class="">
            <h1 class="font-bold text-3xl mb-8 text-green-400 uppercase font-serif">Which Dronie is cleaner?</h1>
            <dronie-voting-list></dronie-voting-list>
        </div>
        <total-votes></total-votes>
    </div>
</div> 
    <div class="bg-slate-800 py-12">
        <div class="mx-auto text-center">
            <h2 class="text-4xl font-bold text-white uppercase font-serif mb-6">Find a Dronie</h2>
            <p class="text-slate-400 mb-6 px-4">Find out how clean your Dronie is by searching by their NFT collection ID.</p>
            <dronie-search></dronie-search>
        </div>
    </div>

    <div class="md:flex gap-12 p-8" id="about">
        <div id="faqs" class="md:w-2/3">
            <h2 class="text-4xl font-bold text-white uppercase font-serif mb-6">FAQs</h2>
            <ul>
                @foreach ($faqs as $question => $answer)
                <li class="mb-4">
                    <h3 class="text-white font-bold">{{$question}}</h3>
                    <p class="text-slate-300">{!! $answer !!}</p>
                </li>
                @endforeach
            </ul>
        </div>
        <div id="community" class="text-center md:w-1/3 text-green-400 md:mt-0 mt-6">
            <h2 class="text-4xl font-serif text-white uppercase mb-6">Join the Community</h2>
            <p class="text-slate-300 mb-8">The Dronies community is incredibly active and fun. Whether you're a new NFT noob or a seasoned crypto veteran from the mountains of Mt. Gox, there's a place for you here.</p>
            <div class="border-4 border-green-400 flex px-8 py-4 items-center gap-3 justify-center w-1/2 mx-auto">
                <svg xmlns="http://www.w3.org/2000/svg" color="currentColor" fill="none" height="19" viewBox="0 0 24 19" width="24">
                    <path d="m20.3303 1.55593c-1.5536-.726872-3.2147-1.255133-4.9514-1.55593-.2133.385611-.4625.904266-.6343 1.31685-1.8461-.27763-3.6753-.27763-5.48744 0-.17177-.412584-.4266-.931239-.6418-1.31685-1.73855.300797-3.4016.830999-4.95517 1.55978-3.133547 4.73521-3.983001 9.35282-3.558273 13.90482 2.078333 1.552 4.092493 2.4949 6.072663 3.1118.48891-.6729.92495-1.3881 1.3006-2.142-.71543-.2718-1.40065-.6073-2.04811-.9968.17177-.1272.33979-.2603.50211-.3972 3.94902 1.8471 8.23972 1.8471 12.14152 0 .1643.1369.3323.27.5021.3972-.6493.3914-1.3364.7269-2.0518.9987.3756.752.8098 1.4692 1.3006 2.142 1.982-.6169 3.9981-1.5597 6.0764-3.1137.4984-5.277-.8513-9.85214-3.5677-13.90867zm-12.31712 11.10917c-1.18546 0-2.15763-1.1066-2.15763-2.4543 0-1.34771.95141-2.45631 2.15763-2.45631 1.20624 0 2.17842 1.10666 2.15762 2.45631.0019 1.3477-.95138 2.4543-2.15762 2.4543zm7.97352 0c-1.1854 0-2.1576-1.1066-2.1576-2.4543 0-1.34771.9514-2.45631 2.1576-2.45631 1.2063 0 2.1784 1.10666 2.1577 2.45631 0 1.3477-.9514 2.4543-2.1577 2.4543z" fill="#57c15f"/>
                </svg>
                <a href="https://discord.com/invite/8naUgEcYEx" class="font-bold uppercase text-3xl font-serif">Discord</a>
            </div>
        </div>
    </div>
</div>
@endsection