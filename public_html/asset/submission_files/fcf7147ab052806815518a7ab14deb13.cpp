#include <iostream>
#include <algorithm>
#include <cmath>
#include <string.h>
#include <vector>
#define ll long long

using namespace std; 

int jumlah[30]; 
vector <int> pbeda; 

int main(){
  string s; 
  int t; 
  cin >> t; 
  for(int i=1; i<=t; i++){
    int max = 0; 
    int nsama = 0; 
    cin >> s;
    for(int j=0; j<s.size(); j++){
      jumlah[s[j] - 96]++; 
      if(s[j]- 96 > max) max = s[j]- 96; 
    }
    for(int j=1; j<max; j++){
      if(jumlah[j] == jumlah[j+1]){
        nsama = jumlah[j];
      }
      else pbeda.push_back(j+1); 
    }
    if(pbeda.size() != 1) cout << "NO" << endl; 
    else if(nsama - jumlah[pbeda[0]] == 1 || jumlah[pbeda[0]] == 1) cout << "YES" << endl;
    else cout << "NO" << endl; 
  }
}