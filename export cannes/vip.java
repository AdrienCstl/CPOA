/***********************************************************************
 * Module:  Personne.java
 * Author:  Paul
 * Purpose: Defines the Class Personne
 ***********************************************************************/

import java.util.*;

/** @pdOid 74bad5a6-18a8-437c-b5e0-65ff84d78b43 */
public class vip {
   /** @pdOid 5357c239-ed82-4d46-a084-1d613c37552f */
   private String type;
   /** @pdOid 1c58a94b-381b-4d5e-b296-1c289ba10021 */
   private int IDVIP;
   /** @pdOid 672ee8d2-d582-468c-9f0d-8cba4e38cfd5 */
   private String nationalite;
   /** @pdOid c6396315-fdc8-428e-a39b-2ddcb32e90f3 */
   private String nom;
   /** @pdOid 20617ddc-cdd1-4963-92de-f76c1eb42991 */
   private String prenom;
   
   /** @pdRoleInfo migr=no name=Equipe_du_film assc=compose coll=java.util.Collection impl=java.util.HashSet mult=0..* */
   public java.util.Collection<Equipe_du_film> equipe_du_film;
   /** @pdRoleInfo migr=no name=Jury assc=appartient coll=java.util.Collection impl=java.util.HashSet mult=0..* */
   public java.util.Collection<Jury> jury;
   
   /** @pdOid b09e17ee-cfca-4443-a392-0fc697510523 */
   public void getinfoVIP() {
      // TODO: implement
   }
   
   
   /** @pdGenerated default getter */
   public java.util.Collection<Equipe_du_film> getEquipe_du_film() {
      if (equipe_du_film == null)
         equipe_du_film = new java.util.HashSet<Equipe_du_film>();
      return equipe_du_film;
   }
   
   /** @pdGenerated default iterator getter */
   public java.util.Iterator getIteratorEquipe_du_film() {
      if (equipe_du_film == null)
         equipe_du_film = new java.util.HashSet<Equipe_du_film>();
      return equipe_du_film.iterator();
   }
   
   /** @pdGenerated default setter
     * @param newEquipe_du_film */
   public void setEquipe_du_film(java.util.Collection<Equipe_du_film> newEquipe_du_film) {
      removeAllEquipe_du_film();
      for (java.util.Iterator iter = newEquipe_du_film.iterator(); iter.hasNext();)
         addEquipe_du_film((Equipe_du_film)iter.next());
   }
   
   /** @pdGenerated default add
     * @param newEquipe_du_film */
   public void addEquipe_du_film(Equipe_du_film newEquipe_du_film) {
      if (newEquipe_du_film == null)
         return;
      if (this.equipe_du_film == null)
         this.equipe_du_film = new java.util.HashSet<Equipe_du_film>();
      if (!this.equipe_du_film.contains(newEquipe_du_film))
         this.equipe_du_film.add(newEquipe_du_film);
   }
   
   /** @pdGenerated default remove
     * @param oldEquipe_du_film */
   public void removeEquipe_du_film(Equipe_du_film oldEquipe_du_film) {
      if (oldEquipe_du_film == null)
         return;
      if (this.equipe_du_film != null)
         if (this.equipe_du_film.contains(oldEquipe_du_film))
            this.equipe_du_film.remove(oldEquipe_du_film);
   }
   
   /** @pdGenerated default removeAll */
   public void removeAllEquipe_du_film() {
      if (equipe_du_film != null)
         equipe_du_film.clear();
   }
   /** @pdGenerated default getter */
   public java.util.Collection<Jury> getJury() {
      if (jury == null)
         jury = new java.util.HashSet<Jury>();
      return jury;
   }
   
   /** @pdGenerated default iterator getter */
   public java.util.Iterator getIteratorJury() {
      if (jury == null)
         jury = new java.util.HashSet<Jury>();
      return jury.iterator();
   }
   
   /** @pdGenerated default setter
     * @param newJury */
   public void setJury(java.util.Collection<Jury> newJury) {
      removeAllJury();
      for (java.util.Iterator iter = newJury.iterator(); iter.hasNext();)
         addJury((Jury)iter.next());
   }
   
   /** @pdGenerated default add
     * @param newJury */
   public void addJury(Jury newJury) {
      if (newJury == null)
         return;
      if (this.jury == null)
         this.jury = new java.util.HashSet<Jury>();
      if (!this.jury.contains(newJury))
         this.jury.add(newJury);
   }
   
   /** @pdGenerated default remove
     * @param oldJury */
   public void removeJury(Jury oldJury) {
      if (oldJury == null)
         return;
      if (this.jury != null)
         if (this.jury.contains(oldJury))
            this.jury.remove(oldJury);
   }
   
   /** @pdGenerated default removeAll */
   public void removeAllJury() {
      if (jury != null)
         jury.clear();
   }

}