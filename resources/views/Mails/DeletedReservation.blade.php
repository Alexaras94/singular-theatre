<x-mail::message>
    # Η κράτησή σας ακυρώθηκε!

    Στοιχεία κράτησης:

    Ημερομηνία παράστασης: {{ $venue->venue_date }}
    Ώρα παράστασης: {{ $venue->venue_time }}
    Ονοματεπώνυμο: {{ $reservation->username }}
    Εταιρεία: {{ $reservation->company }}
    Αριθμός θέσεων: {{ $reservation->number_of_seats }}

    Σας ευχαριστούμε!
</x-mail::message>
