<x-mail::message>
    # Η κράτησή σας πραγατοποιήθηκε με επιτυχία

    Στοιχεία κράτησης:

    Ημερομηνία παράστασης:
    Ονοματεπώνυμο: {{ $reservation->username }}
    Εταιρεία: {{ $reservation->company }}
    Αριθμός θέσεων: {{ $reservation->number_of_seats }}

    Ευχαριστούμε,

</x-mail::message>
