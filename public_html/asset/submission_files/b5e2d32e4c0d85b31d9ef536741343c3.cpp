#include <iostream>
#include <algorithm>
#include <cmath>
#include <string.h>
#include <vector>
#define ll long long

using namespace std; 

int tx[105];
int ty[105];
int kerja[105]; 

bool descending(int a, int b){
  if(a > b) return true; 
  else return false; 
}

int main(){
  int t, n, d, r; 
  cin >> t; 
  for(int i=1; i<=t; i++){
    int jumlah = 0; 
    cin  >> n >> d >> r; 
    for(int j=1; j<=n; j++){
      cin >> tx[j]; 
    }
    for(int j=1; j<=n; j++){
      cin >> ty[j]; 
    }
    sort(tx+1, tx+n+1); 
    sort(ty+1, ty+n+1, descending); 
    for(int j=1; j<=n; j++){
      kerja[j] = tx[j] + ty[j]; 
      if(kerja[j] >= d) jumlah += kerja[j] - d; 
    }
    cout << jumlah*r << endl; 
  }
}