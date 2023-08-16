import 'package:flirt/src/view/dismoi.dart';
import 'package:flirt/src/view/hot.dart';
import 'package:flirt/src/view/jenaijamais.dart';
import 'package:flirt/src/view/question.dart';
import 'package:flirt/src/view/quidenous.dart';
import 'package:flutter/material.dart';
import 'package:google_fonts/google_fonts.dart';

class categorieCard extends StatelessWidget {
  final String nom;
  final String description;
  final String icon;
  final String page;

  const categorieCard(
      {Key? key,
      required this.nom,
      required this.description,
      required this.icon,
      required this.page})
      : super(key: key);

  _goToPage(_page, BuildContext context) {
    switch (_page) {
      case "aleatoire":
        Navigator.of(context).push(
          MaterialPageRoute(
            builder: (context) => Question(),
          ),
        );
        break;

      case "hot":
        Navigator.of(context).push(
          MaterialPageRoute(
            builder: (context) => Hot(),
          ),
        );
        break; 
        case "qui_de_nous":
        Navigator.of(context).push(
          MaterialPageRoute(
            builder: (context) => QuiDeNous(),
          ),
        );
        break;
        
        case "je_nai_jamais":
        Navigator.of(context).push(
          MaterialPageRoute(
            builder: (context) => JenaiJamais(),
          ),
        );
        break; 
        
        case "dis_moi":
        Navigator.of(context).push(
          MaterialPageRoute(
            builder: (context) => Dismoi(),
          ),
        );
        break;
      default:
    }
  }

  @override
  Widget build(BuildContext context) {
    return GestureDetector(
      onTap: () => _goToPage(page, context),
      child: Padding(
        padding:
            const EdgeInsets.only(left: 15, right: 15, top: 15, bottom: 20),
        child: Container(
          height: 100,
          width: double.infinity,
          decoration: BoxDecoration(
              color: Colors.white, borderRadius: BorderRadius.circular(15)),
          child: Row(
              crossAxisAlignment: CrossAxisAlignment.start,
              mainAxisAlignment: MainAxisAlignment.start,
              children: [
                Padding(
                  padding: const EdgeInsets.only(left: 7, right: 5, top: 10),
                  child: Image.asset(
                    "assets/icons${icon}",
                    height: 70,
                  ),
                ),
                Padding(
                  padding: const EdgeInsets.all(10),
                  child: Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      Text(
                        nom,
                        style: GoogleFonts.poppins(
                            fontSize: 16, fontWeight: FontWeight.w700),
                      ),
                      SizedBox(
                        height: 10,
                      ),
                      Text(
                        description,
                        style: GoogleFonts.lato(
                            fontSize: 14, fontWeight: FontWeight.w700),
                      ),
                    ],
                  ),
                )
              ]),
        ),
      ),
    );
  }
}
