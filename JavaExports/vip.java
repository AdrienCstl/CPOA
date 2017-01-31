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
   
   /** @pdRoleInfo migr=no name=Equipe_du_film assc=compose mult=0..1 */
   public Equipe_du_film equipe_du_film;
   /** @pdRoleInfo migr=no name=Jury assc=appartient mult=0..1 */
   public Jury jury;
   
   /** @pdOid b09e17ee-cfca-4443-a392-0fc697510523 */
   public void getinfoVIP() {
      // TODO: implement
   }

}