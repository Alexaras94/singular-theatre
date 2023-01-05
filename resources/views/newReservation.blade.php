@extends('layouts.layout')





@section('content')
    @inject('helper', \App\helper\FreeSeatsHelper::class)
    @if ($errors->any())
        {!! implode('', $errors->all('<div>:message</div>')) !!}
    @endif


    <div class="flex flex-col items-center">
        <div class="text-center w-4/6 border border-1 border-slate-900 my-3">

            <p class="text-xl my-3">Κράτηση θέσεων στην θεατρική παράσταση</p>
            <h1 class="text-3xl underline mt-3"><strong>Interview</strong></h1>
            <p class="text-md mt-1">Ομάδα «Εμείς»</p>
            <p class="m-5 text-lg">
                Η θεατρική ομάδα των εταιρειών SingularLogic και Epsilon Singularlogic παρουσιάζει στις 29 και 30
                Ιανουαρίου καθώς και 2 και 5 Φεβρουαρίου 2023 το έργο «Interview» γραμμένο από την Ομάδα «Εμείς»,
                στο θέατρο Αλάμπρα.
            </p>

            <p class="m-5 text-lg">

                Το έργο, μια κοινωνικοπολιτική μαύρη κωμωδία, που με άξονα την εξουσία και τις
                εργασιακές σχέσεις εξερευνά και περιγράφει τις συμπεριφορές των ανθρώπων, τους ανταγωνισμούς που
                αναπτύσσονται μεταξύ τους, τις αξίες τους, τις αντοχές τους σε συνθήκες πίεσης και τους συμβιβασμούς
                που είναι διατεθειμένοι να κάνουν.
            </p>
        </div>



        <div class="my-2 w-3/6">
            <form class="grid lg:grid-cols-2 gap-1" action="{{ route('reservations.store') }}" method="post">

                @csrf
                @if (session('status') == 'success')
                    <p class="text-green-600 font-bold lg:col-span-2 text-center justify-self-center">
                        Η κράτησή σας πραγματοποιήθηκε με επιτυχία!
                    </p>
                @elseif(session('status') == 'fail')
                    <p class="text-red-600 font-bold lg:col-span-2 text-center justify-self-center">
                        Η κράτηση απέτυχε.
                    </p>
                @elseif(session('status') == 'invalid number of seats')
                    <p class="text-red-600 font-bold lg:col-span-2 text-center justify-self-center">
                        Οι διαθέσιμες θέσεις δεν είναι αρκετές για την πραγματποίηση της κράτησής σας!
                    </p>
                @elseif(session('status') == 'repeated')
                    <p class="text-red-600 font-bold lg:col-span-2 text-center justify-self-center">
                        Υπάρχει ήδη κράτηση για το συγκεκριμένο email!
                    </p>
                @endif

                <select required name="venue_id" id="venue_id"
                    class="m-3 border-2 border-slate-900 rounded-lg focus:border-slate-900 focus:ring-0">

                    <option value="" hidden>
                        Επιλέξτε ημερομηνία
                    </option>
                    @foreach ($venues as $venue)
                        @if ($venue->status == 'ACTIVE')
                            <option value="{{ $venue->id }}" style="color:{{ $helper->DropDownColour($venue) }} ">
                                {{ $venue->venue_date }}
                            </option>
                        @endif
                    @endforeach

                </select>

                <input required type="number" name="number_of_seats" min=1 max=4 placeholder="Αριθμός Θέσεων"
                    class="m-3 border-2 border-slate-900 rounded-lg focus:border-slate-900 focus:ring-0" />

                <input required type="text" name="username" placeholder="Οναματεπώνυμο"
                    class="m-3 border-2 border-slate-900 rounded-lg focus:border-slate-900 focus:ring-0" />

                <select required name="company" id="company"
                    class="m-3 border-2 border-slate-900 rounded-lg focus:border-slate-900 focus:ring-0">

                    <option value="" hidden>
                        Επιλέξτε Εταιρεία
                    </option>
                    <option value="SingularLogic">
                        SingularLogic
                    </option>
                    <option value="Epsilon Singularlogic">
                        Epsilon Singularlogic
                    </option>
                    <option value="Epsilon">
                        Epsilon
                    </option>
                    <option value="Space">
                        Space
                    </option>

                </select>

                <input required type="email" name="email" placeholder="Email"
                    class="m-3 border-2 border-slate-900 rounded-lg focus:border-slate-900 focus:ring-0" />

                <input required type="text" name="phone_number" placeholder="Κινητό Τηλέφωνο"
                    class="m-3 border-2 border-slate-900 rounded-lg focus:border-slate-900 focus:ring-0" />

                <button type="submit"
                    class="w-1/6 lg:col-span-2 bg-slate-900 text-white justify-self-center p-2 mt-4 rounded-lg">Κράτηση</button>




            </form>




        </div>



    </div>
@endsection
