import 'package:http/http.dart' as http;

class ApiService {
  final String apiurl = "http://flirt.mister-wallet.com/api";
  

  _setHeaders() =>
      {'Content-type': 'application/json', 'Accept': 'application/json'};

  getRequest(url) async {
    var fullUrl = apiurl + url;
    print(fullUrl);
    return await http.get(Uri.parse(fullUrl), headers: _setHeaders());
  }
}
