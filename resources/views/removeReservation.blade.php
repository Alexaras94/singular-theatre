@extends('layouts.layout')


@section('content')
    <div class="flex flex-col items-center">
        <div
            class="text-center w-7/12 bg-card rounded-2xl my-6 text-white shadow-xl shadow-shadow max-md:max-h-72 max-md:overflow-y-scroll">

            <p class="text-xl my-3">Ακύρωση κράτησης για την θεατρική παράσταση</p>
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

        <p class='text-white font-semibold mt-6 px-2 text-xl border-b border-white'>Ακύρωση Κράτησης</p>

        <div class="mt-8 w-1/2">

            <form class="grid lg:grid-cols-2 gap-3" action="{{ route('reservations.destroy', 'reservation') }}"
                method="POST">
                @method('DELETE ')
                @csrf


                @if (session('status') == 'fail')
                    <p class="text-slg-red font-bold lg:col-span-2 text-center justify-self-center">
                        Δεν βρέθηκε κράτηση με το συγκεκριμένο email για αυτή την ημερομηνία
                    </p>
                @endif

                <select required name="venue_id" id="venue_id"
                    class="m-3 border-2 border-shadow rounded-lg focus:border-shadow focus:ring-0">
                    <option value="" hidden>
                        Επιλέξτε ημερομηνία
                    </option>
                    @foreach ($venues as $venue)
                        <option value="{{ $venue->id }}">
                            {{ $venue->venue_date }}
                        </option>
                    @endforeach

                </select>

                <input required type="email" name="email" placeholder="Email"
                    class="m-3 border-2 border-shadow rounded-lg focus:border-shadow focus:ring-0">




                <button type="submit"
                    class="lg:col-span-2 bg-slg-red text-white justify-self-center p-2 my-4 rounded-lg active:bg-button">
                    Ακύρωση
                    Κράτησης</button>

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
                        e.target.setCustomValidity("Παρακαλώ εισάγετε ένα έγκυρο email");
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
                        e.target.setCustomValidity("Παρακαλώ επιλέξτε ημερομηνία παράστασης");
                    }
                };
                elements[i].oninput = function(e) {
                    e.target.setCustomValidity("");
                };
            }
        })
    </script>
@endsection
