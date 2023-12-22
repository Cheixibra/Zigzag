import java.time.LocalDate;

public class Main {
    public static void main(String[] args) {

        LocalDate dateNaissance = LocalDate.of(2010, 5, 20);
        Personne personne = new Personne("Dieng", "Chiex", dateNaissance);


        personne.afficherDetails();
    }
}