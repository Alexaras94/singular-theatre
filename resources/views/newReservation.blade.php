@extends('layouts.layout')





@section('content')
    @inject('helper', \App\helper\FreeSeatsHelper::class)



    <div class="flex flex-col items-center">
        <div
            class="text-center w-7/12 bg-card rounded-2xl my-6 text-white shadow-xl shadow-shadow max-md:max-h-72 max-md:overflow-y-scroll">

            <p class="text-xl my-3">Κράτηση θέσεων στην θεατρική παράσταση</p>
            <h1 class="text-3xl underline mt-3"><strong>Interview</strong></h1>
            <p class="text-md mt-1">της ομάδας «Εμείς»</p>
            <p class="m-5 text-lg">
                Η θεατρική ομάδα των εταιρειών SingularLogic και Epsilon Singularlogic παρουσιάζει στις 29 και 30
                Ιανουαρίου καθώς και 2 και 5 Φεβρουαρίου 2023 το έργο «Interview» γραμμένο από την Ομάδα «Εμείς»,
                στο θέατρο Αλάμπρα στις 21:00.
            </p>

            <p class="m-5 text-lg">

                Το έργο, μια κοινωνικοπολιτική μαύρη κωμωδία, που με άξονα την εξουσία και τις
                εργασιακές σχέσεις εξερευνά και περιγράφει τις συμπεριφορές των ανθρώπων, τους ανταγωνισμούς που
                αναπτύσσονται μεταξύ τους, τις αξίες τους, τις αντοχές τους σε συνθήκες πίεσης και τους συμβιβασμούς
                που είναι διατεθειμένοι να κάνουν.
            </p>
        </div>

        <p class='text-white font-semibold mt-6 px-2 text-xl border-b border-white'>Κράτηση Θέσεων</p>

        <div class="mt-8 w-3/6">
            <form class="grid lg:grid-cols-2 gap-1" action="{{ route('reservations.store') }}" method="post">

                @csrf
                @if (session('status') == 'success')
                    <p class="text-success font-bold lg:col-span-2 text-center justify-self-center">
                        Η κράτησή σας πραγματοποιήθηκε με επιτυχία!
                    </p>
                @elseif(session('status') == 'fail')
                    <p class="text-slg-red font-bold lg:col-span-2 text-center justify-self-center">
                        Η κράτηση απέτυχε.
                    </p>
                @elseif(session('status') == 'invalid number of seats')
                    <p class="text-slg-red font-bold lg:col-span-2 text-center justify-self-center">
                        Οι διαθέσιμες θέσεις δεν είναι αρκετές για την πραγματοποίηση της κράτησής σας!
                    </p>
                @elseif(session('status') == 'repeated')
                    <p class="text-slg-red font-bold lg:col-span-2 text-center justify-self-center">
                        Υπάρχει ήδη κράτηση για το συγκεκριμένο email!
                    </p>
                @elseif(session('status') == 'deleted')
                    <p class="text-success font-bold lg:col-span-2 text-center justify-self-center">
                        Η κράτηση σας διαγράφηκε.
                    </p>
                @endif


                @if ($errors->any())
                    {!! implode(
                        '',
                        $errors->all('<p class= "text-slg-red font-bold lg:col-span-2 text-center justify-self-center">:message</p>'),
                    ) !!}
                @endif



                <select required name="venue_id" id="venue_id"
                    class="m-3 border-2 border-shadow rounded-lg focus:border-shadow focus:ring-0">

                    <option value="" hidden>
                        Επιλέξτε ημερομηνία
                    </option>
                    @foreach ($venues as $venue)
                        @if ($venue->status == 'ACTIVE')
                            <option value="{{ $venue->id }}" style="color:{{ $helper->DropDownColour($venue) }} ">
                                @if ($helper->DropDownColour($venue) == '#FF3333')
                                    {{ $venue->venue_date . ' (Απομένουν ' . $venue->free_seats . ' θέσεις)' }}
                                @else
                                    {{ $venue->venue_date }}
                                @endif
                            </option>
                        @elseif ($venue->status == 'EXPIRED')
                            <option value="{{ $venue->id }}" disabled>
                                {{ $venue->venue_date . ' (Περασμένη ημερομηνία)' }}
                            </option>
                        @elseif ($venue->status == 'SOLD OUT')
                            <option value="{{ $venue->id }}" disabled>
                                {{ $venue->venue_date . ' (SOLD OUT)' }}
                            </option>
                        @else
                            <option value="{{ $venue->id }}" disabled>
                                {{ $venue->venue_date . ' (Ανενεργή)' }}
                            </option>
                        @endif
                    @endforeach

                </select>

                <input required type="number" name="number_of_seats" min=1 max=4 placeholder="Αριθμός Θέσεων"
                    class="m-3 border-2 border-shadow rounded-lg focus:border-shadow focus:ring-0" />

                <input required type="text" name="username" placeholder="Ονοματεπώνυμο"
                    pattern="[a-zA-ZΑ-Ωα-ωίϊΐόάέύϋΰήώ]*+[ ]+[a-zA-ZΑ-Ωα-ωίϊΐόάέύϋΰήώ]*" minlength="8" maxlength="30"
                    class="m-3 border-2 border-shadow rounded-lg focus:border-shadow focus:ring-0" />

                <select required name="company" id="company"
                    class="m-3 border-2 border-shadow rounded-lg focus:border-shadow focus:ring-0">

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
                        Epsilon Net
                    </option>
                    <option value="Space">
                        Space Hellas
                    </option>
                    <option value="Άλλο">
                        Άλλο
                    </option>

                </select>

                <input required type="email" name="email" placeholder="Email"
                    class="m-3 border-2 border-shadow rounded-lg focus:border-shadow focus:ring-0" />

                <input required type="tel" name="phone_number" placeholder="Κινητό Τηλέφωνο" pattern="69+[0-9]{8}"
                    class="m-3 border-2 border-shadow rounded-lg focus:border-shadow focus:ring-0" />

                <p class="lg:col-span-2 text-white text-xs px-3">Τα στοιχεία Ονοματεπώνυμο, email,
                    κινητό τηλέφωνο και εταιρία απαιτούνται για τις ανάγκες κράτησης θέσεων και εισόδου στο θέατρο αντί
                    εισιτηρίου. Τα στοιχεία αυτά δεν θα χρησιμοποιηθούν για κανέναν άλλο σκοπό πέραν του αναφερομένου
                    και θα διαγραφούν εντός 10 ημερών από την ολοκλήρωση των παραστάσεων.</p>


                <div class="lg:col-span-2 flex justify-start items-center">
                    <input required type="checkbox" name="terms"
                        class="m-3 border-2 border-shadow rounded-md focus:border-shadow focus:ring-0 text-success" />

                    <label for="terms" class="text-white text-xs">Αποδoχή
                    </label>
                </div>



                <button type="submit"
                    class="lg:col-span-2 bg-slg-red text-white justify-self-center p-2 my-4 rounded-lg active:bg-button">Κράτηση</button>




            </form>




        </div>



    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var elements = document.getElementsByTagName("INPUT");
            for (var i = 0; i < elements.length; i++) {
                elements[i].oninvalid = function(e) {
                    e.target.setCustomValidity("");
                    if (!e.target.validity.valid) {
                        switch (e.target.name) {
                            case 'number_of_seats':
                                e.target.setCustomValidity("Παρακαλώ εισάγετε έναν αριθμό από 1 εώς 4");
                                break;
                            case 'username':
                                e.target.setCustomValidity(
                                    "Παρακαλώ εισάγετε όνομα και επώνυμο (από 8 εώς 30 χαρακτήρες)");
                                break;
                            case 'email':
                                e.target.setCustomValidity("Παρακαλώ εισάγετε ένα έγκυρο email");
                                break;
                            case 'phone_number':
                                e.target.setCustomValidity(
                                    "Παρακαλώ εισάγετε έναν έγκυρο αριθμό κινητού τηλεφώνου");
                                break;
                            case 'terms':
                                e.target.setCustomValidity(
                                    "Παρακαλώ αποδεχτείτε του όρους");
                                break;
                            default:
                                break;
                        }
                    }
                };
                elements[i].oninput = function(e) {
                    e.target.setCustomValidity("");
                };
            }
            var elements = document.getElementsByTagName("SELECT");
            for (var i = 0; i < elements.length; i++) {
                elements[i].oninvalid = function(e) {
                    e.target.setCustomValidity("");
                    if (!e.target.validity.valid) {
                        switch (e.target.name) {
                            case 'venue_id':
                                e.target.setCustomValidity("Παρακαλώ επιλέξτε ημερομηνία παράστασης");
                                break;
                            case 'company':
                                e.target.setCustomValidity(
                                    "Παρακαλώ επιλέξτε εταιρεία");
                                break;
                            default:
                                break;

                        }
                    }
                };
                elements[i].oninput = function(e) {
                    e.target.setCustomValidity("");
                };
            }
        })
    </script>
@endsection
