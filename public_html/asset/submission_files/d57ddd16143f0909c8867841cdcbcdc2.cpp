#include <iostream>
#include <string.h>

using namespace std; 

int isi[50][50];
int m, n; 
bool visit[50][50]; 

int jumlah(int x, int y, int warna){
  if(x < 0 || y < 0 || x >= m || y >= n) return 0;
  if(isi[x][y] != 1) return 0; 
  if(visit[x][y]){
    return 0;
  }
  
  visit[x][y] = 1;
  int jlh = 1; 
  int cx[8] = {-1, 0, 1, 0, 1, -1, -1, 1}; 
  int cy[8] = {0, 1, 0, -1, 1, 1, -1, -1}; 
  for(int i=0; i<8; i++){
    jlh += jumlah(x+cx[i], y+cy[i], warna); 
  }
  return jlh; 
}

int main(){
  int b, k, ans, j, t;
  cin >> t; 
  for(int i=1; i<=t; i++){
     ans = 0; 
     cin >> m >> n;
     memset(visit, false, sizeof(visit)); 
     for(int row=0; row<=m-1; row++){
      for(int col=0; col<=n-1; col++){
       cin >> isi[row][col]; 
      }
     }
     for(int row=0; row<=m-1; row++){
      for(int col=0; col<=n-1; col++){
        if(visit[row][col] == false){
          j = jumlah(row, col, isi[row][col]); 
          if(j > ans) ans = j; 
        }
        else continue; 
      }
     }
  cout << ans << endl; 
  }
}