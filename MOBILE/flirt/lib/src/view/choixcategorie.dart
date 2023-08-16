import 'package:flutter/material.dart';
import 'package:google_fonts/google_fonts.dart';
import 'package:flirt/src/view/components/categoriecard.dart';

class ChoixCategorie extends StatefulWidget {
  ChoixCategorie({Key? key}) : super(key: key);

  @override
  State<ChoixCategorie> createState() => _ChoixCategorieState();
}

class _ChoixCategorieState extends State<ChoixCategorie> {

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.pink[300],
      
      body: Column(children:  [
      const  SizedBox(height: 50,),
        Column(
         
         children: [
            Center(
              child: Text("Flirt",style: GoogleFonts.poppins(
              fontSize: 40,color: Colors.white,fontWeight: FontWeight.w800
              ),),
            ),

           const SizedBox(height: 30,),
       
          ],

        ),
          Expanded(
            child: SingleChildScrollView(
            
            scrollDirection: Axis.vertical,
            child: Column(children:const [
                    categorieCard(nom: "Aléatoire",description: "tous les thémes",icon: "/aleatoire.png",page: "aleatoire",),
                     categorieCard(nom: "Hot",description: "un peu de chaleur",icon: "/hot.png",page: "hot",),
                     categorieCard(nom: "Dis moi..",description: "mieux nous connaitre sur ses sujets",icon: "/dismoi.png",page: "dis_moi",),
                     categorieCard(nom: "Qui de nous 2 ",description: "il y'aura des surprises",icon: "/couple.png",page: "qui_de_nous",),
                     categorieCard(nom: "Je n'ai jamais",description: "pas de mensonge",icon: "/choice.png",page: "je_nai_jamais",),
           ]),
                   ),
          ),
      ]),
    );
  }
}