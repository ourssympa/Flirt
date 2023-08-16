import 'dart:async';
import 'dart:math';

import 'package:flirt/src/Controller/question_controller.dart';
import 'package:flirt/src/Model/question_model.dart';
import 'package:flutter/material.dart';
import 'package:google_fonts/google_fonts.dart';
import 'package:loading_animation_widget/loading_animation_widget.dart';

class Dismoi extends StatefulWidget {
  Dismoi({Key? key}) : super(key: key);

  @override
  State<Dismoi> createState() => _DismoiState();
}

class _DismoiState extends State<Dismoi> {
  List<QuestionModel> questions = [];
  String? question;
 bool _isLoading = true;
  var random = new Random();

  _getQestion() {
    setState(() {
      question = questions.isNotEmpty
          ? questions[random.nextInt(questions.length)].question
          : "erreur de chargement ddd";
    });
  }

  @override
  void initState() {
    // TODO: implement initState
    super.initState();
    _chargedata();

     Timer(Duration(seconds: 2), () {
      setState(() {
        _isLoading = false;
      });
    });
  }

  _chargedata() async {
    final datas = await QestionController().getQuestionSortByCategorie("dis_moi");
    setState(() {
      questions = datas;
      question = datas[random.nextInt(datas.length)].question;
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.pink[300],
      body: Container(
          child: Column(

            children: [
              SizedBox(height: 70,),
              Center(
              
              child: Row(
                crossAxisAlignment: CrossAxisAlignment.center,
                mainAxisAlignment: MainAxisAlignment.center,
                children: [
                  Container(
                    height: 90,
                    width: 90,
                    decoration: BoxDecoration(image: DecorationImage(image: AssetImage(
                    "assets/icons/dismoi.png",
                   
                  ))),),
                  Column(
                    children: [
                      Text("Flirt",style: GoogleFonts.poppins(
                      fontSize: 40,color: Colors.white,fontWeight: FontWeight.w800
                      ),),
                      Text("Dis moi",style: GoogleFonts.poppins(
                      fontSize: 30,color: Colors.white,fontWeight: FontWeight.w800
                      ),),
                    ],
                  ),
                ],
              ),
            ),
              
              Expanded(
                child: Column(
                      crossAxisAlignment: CrossAxisAlignment.center,
                      mainAxisAlignment: MainAxisAlignment.center,
                      children: [
                Padding(
                  padding: const EdgeInsets.all(25),
                  child: Container(
                    height: 300,
                    width: double.infinity,
                    decoration: BoxDecoration(
                        color: Colors.white, borderRadius: BorderRadius.circular(25)),
                    child: Center(
                      child: Padding(
                        padding: EdgeInsets.symmetric(horizontal: 20),
                        child: Column(
                          crossAxisAlignment: CrossAxisAlignment.center,
                          mainAxisAlignment: MainAxisAlignment.center,
                          children: [
                            Container(
                              height: 150,
                              child:_isLoading?LoadingAnimationWidget.inkDrop(color: Colors.pink,size: 70): Text(
                                question==null?" ":"$question",
                                style: GoogleFonts.poppins(
                                    fontSize: 20, fontWeight: FontWeight.w700),
                              ),
                            ),
                            SizedBox(
                              height: 20,
                            ),
                            GestureDetector(
                              onTap: _getQestion,
                              child: Container(
                                width: double.infinity,
                                height: 60,
                                decoration: BoxDecoration(
                                  color: Colors.red,
                                  borderRadius: BorderRadius.circular(15)
                                ),
                                child: Center(child: Text("suivant",style: GoogleFonts.poppins(color: Colors.white,fontSize: 20,fontWeight: FontWeight.w700),)),
                              ),
                            )
                          ],
                        ),
                      ),
                    ),
                  ),
                )
                      ],
                    ),
              ),
            ],
          )),
    );
  }
}
