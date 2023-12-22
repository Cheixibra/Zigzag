import java.time.LocalDate;
import java.time.Period;

public class Personne {
    private String nom;
    private String prenom;
    private String matricule;
    private int age;
    private LocalDate dateNaissance;


    public Personne(String nom, String prenom, LocalDate dateNaissance) {
        this.nom = nom;
        this.prenom = prenom;
        this.dateNaissance = dateNaissance;
        this.matricule = genererMatricule();
        this.age = calculerAge();
    }


    private String genererMatricule() {
        String matricule = String.valueOf(prenom.charAt(0)) + String.valueOf(nom.charAt(0));
        matricule += String.format("%04d", hashCode() % 10000);
        return matricule.toUpperCase();
    }


    private int calculerAge() {
        LocalDate dateActuelle = LocalDate.now();
        return Period.between(dateNaissance, dateActuelle).getYears();
    }


    public String getMatricule() {
        return matricule;
    }


    public int getAge() {
        return age;
    }




    public void afficherDetails() {
        System.out.println("Nom : " + nom);
        System.out.println("Prénom : " + prenom);
        System.out.println("Matricule : " + matricule);
        System.out.println("Âge : " + age + " ans");
        System.out.println("Date de Naissance : " + dateNaissance);
    }
}