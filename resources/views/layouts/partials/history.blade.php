@extends('layouts.app')
@section('content')

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        
        .section-img {
            width: 100%;
            height: auto;
            margin-top: 20px;
            border-radius: 8px;
        }

        .section {
            padding: 40px 0;
        }

        .section-title {
            margin-bottom: 20px;
            font-weight: bold;
            font-size: 2rem;
        }

        .content {
            padding: 20px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .justify-text {
            text-align: justify;
        }
    </style>


    <div class="container">

        <!-- About CDHI -->
        <div class="section">
            <div class="content">
                <h2 class="section-title">About CDHI</h2>
                <p class="justify-text">Situated along the countryside stretch of national highway in the capital town of Virac,
                    Catanduanes Doctors Hospital Incorporated (CDHI) is the island province’s newest pride.</p>
                <img src="{{ asset('img/history-1.png') }}" class="img-fluid section-img" alt="About CDHI"> <!-- Make the image responsive -->
            </div>
        </div>


        <!-- Visionary Beginnings -->
        <div class="section">
            <div class="content">
                <h2 class="section-title">Visionary Beginnings</h2>
                <p class="justify-text">Dubbed as the biggest private hospital in Catanduanes, CDHI with its close to one hectare land area started as a dream of a bright-minded, 
                    high spirited businessman in the person of Raymond Molina Taopa. The young visionary is a son of the municipality of San Miguel who dreamt of one day 
                    realizing a state-of-the-art health provider facility that can serve the people of Catanduanes who would muster, time, money and distance travelling to Manila if not to mainland 
                    cities for the much sought-after medical check-up.</p>
                    <img src="{{ asset('img/history-2.png') }}" class="img-fluid section-img" alt="About CDHI"> <!-- Replace with your image -->
            </div>
        </div>

        <!-- Finding the Perfect Location -->
        <div class="section">
            <div class="content">
                <h2 class="section-title">Finding the Perfect Location</h2>
                <p class="justify-text">To make his dream for his fellow Catandunganons come to a reality, Mr. Taopa and his party conducted site inspection on May 14, 2014 and found a perfect spot at Barangay Valencia, Virac, Catanduanes. Soon after, meetings with LGUs, local executives and other key players 
                    and stakeholders took place along with Chief Architect Christian M. Flores, a native of Davao City.</p>
                    <img src="{{ asset('img/history-3.png') }}" class="img-fluid section-img" alt="About CDHI">  <!-- Replace with your image -->
            </div>
        </div>

        <!-- Groundbreaking Ceremony -->
        <div class="section">
            <div class="content">
                <h2 class="section-title">Groundbreaking Ceremony</h2>
                <p class="justify-text">On March 18, 2016, the ground breaking ceremony took place as officiated by Diocese of Virac Bishop Manolo Alarcon delos Santos. 
                    On May 27, 2016, day one of construction officially commenced.</p>
                    <img src="{{ asset('img/history-4.png') }}" class="img-fluid section-img" alt="About CDHI">
                    <img src="{{ asset('img/history-5.png') }}" class="img-fluid section-img" alt="About CDHI"> <!-- Replace with your image -->
            </div>
        </div>

        <!-- Overcoming Challenges -->
        <div class="section">
            <div class="content">
                <h2 class="section-title">Overcoming Challenges</h2>
                <p class="justify-text">Just when the construction has been initiated and ongoing, typhoon “Nina” hit the island province on December 26, 2016. Yet with the brave persistence and sheer camaraderie of the people behind CDHI, supported by strong
                     leadership of Mr. Taopa, the team continued to move forward and realize the completion of Catanduanes Doctors Hospital, Inc.</p>
                     <img src="{{ asset('img/history-6.png') }}" class="img-fluid section-img" alt="About CDHI">
                     <img src="{{ asset('img/history-7.png') }}" class="img-fluid section-img" alt="About CDHI"><!-- Replace with your image -->
            </div>
        </div>

        <!-- Soft Opening and Community Service -->
        <div class="section">
            <div class="content">
                <h2 class="section-title">Soft Opening and Community Service</h2>
                <p class="justify-text">The historic site made its soft opening on September 8, 2017, in time with the observance of the feast of Our Lady of Penafrancia. Mr. Taopa, a devout Catholic, heeded the counsel of the province’s beloved religious leader, Bishop de los Santos. The health facility marked another milestone as the men and women of CDHI opened its doors on same date and lead a medical mission to practically indigent members of the community. 
                    About two hundred fifty four pediatric and internal medicine patients benefited the hospital’s initial free services.</p>
                    <img src="{{ asset('img/history-8.png') }}" class="img-fluid section-img" alt="About CDHI">
                    <img src="{{ asset('img/history-9.png') }}" class="img-fluid section-img" alt="About CDHI"><!-- Replace with your image -->
            </div>
        </div>

        <!-- Official Opening -->
        <div class="section">
            <div class="content">
                <h2 class="section-title">Official Opening</h2>
                <p class="justify-text">On February 13, 2018, Catanduanes Doctors Hospital Incorporated finally opens to public as it takes pride of its commitment to offer
                     quality health care service along with its cutting-edge medical facility.</p>
                     <img src="{{ asset('img/history-10.png') }}" class="img-fluid section-img" alt="About CDHI">
                     <img src="{{ asset('img/history-11.png') }}" class="img-fluid section-img" alt="About CDHI"> <!-- Replace with your image -->
            </div>
        </div>

        <!-- A New Era for Catanduanes -->
        <div class="section">
            <div class="content">
                <h2 class="section-title">A New Era for Catanduanes</h2>
                <p class="justify-text">With its prominently elegant structure, CDHI poses as the island’s endearing surprise not only to the people of Catanduanes but also to the global community. To top it all, CDHI’s immense potentials in the medical tourism industry, to likewise include wide job opportunities to the people in and outside Catanduanes, CDHI promises to offer better health and therefore better life. After all,
                     “Your health is our responsibility” is what CDHI is all for.</p>
                     <img src="{{ asset('img/history-12.png') }}" class="img-fluid section-img" alt="About CDHI"><!-- Replace with your image -->
            </div>
        </div>

        

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection
