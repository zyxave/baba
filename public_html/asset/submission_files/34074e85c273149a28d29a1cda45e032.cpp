#include <iostream>
#define ll long long

using namespace std; 

int pangkat(int x, int y){
  ll hasil = 1; 
  if(y == 0) return 1; 
  else {
    for(int i=1; i<=y; i++){
      hasil *= x; 
    }
    return hasil; 
  }
}

int pascal(int x, int y){
  int atas = 1; 
  int bawah = 1; 
  for(int i = 1; i<=y; i++){
    atas *= x; 
    x--; 
  }
  for(int i=1; i<=y; i++){
    bawah *= i; 
  }
  ll hasil = atas/bawah; 
  return hasil; 
}

int main(){
  ll t, p, q; 
  cin >> t; 
  for(int i=1; i<= t; i++){
    ll a, b, c; 
    cin >> p >> q; 
    ll temp = q; 
    for(int j=1; j<=q+1; j++){
      a = pangkat(p, j-1); 
      b = pascal(q, j-1); 
      c = a*b; 
      if(c != 1) cout << c; 
      if(temp > 1) cout << "x" << temp;
      else if(temp == 1) cout << "x"; 
      cout << " "; 
      temp--; 
    }
    cout << endl; 
  }
}