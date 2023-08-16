import 'dart:convert';

import 'package:flirt/src/Model/question_model.dart';
import 'package:flirt/src/Service/api_service.dart';

class QestionController {
  Future<List<QuestionModel>> getQuestions() async {
    String ulr = "/questions";

    List<QuestionModel> questions = [];
    var res = await ApiService().getRequest(ulr);

    List datas = jsonDecode(res.body)['data'];

    for (var i = 0; i < datas.length; i++) {
      questions.add(QuestionModel.fromJson(datas[i]));
    }

    return questions;
  }

  Future<List<QuestionModel>> getQuestionSortByCategorie(
      String categorie) async {
    final url = "/sort/" + categorie ;

    List<QuestionModel> questions = [];
    var res = await ApiService().getRequest(url);

    List datas = jsonDecode(res.body)['data'];

    for (var i = 0; i < datas.length; i++) {
      questions.add(QuestionModel.fromJson(datas[i]));
    }
    return questions;
  }
}
