#include <bits/stdc++.h>
using namespace std;
int n, m, temp = 0, i, j;
char c[11][11];
int note[11][11];
bool valid(int x, int y){
	return x > -1 && x < n && y > -1 && y < m && note[x][y] != 1 && c[x][y] == c[i][j];
}
void area(int a, int b){
	if(!valid(a, b))
		return;
	note[a][b] = 1;
	temp ++;
	area(a + 1, b);
	area(a - 1, b);
	area(a, b + 1);
	area(a, b - 1);
}
int main(){
	int tc;	cin >> tc;
	while(tc--){
		int ans = 0;
		cin >> n >> m;
		for(int t1 = 0; t1 < n; t1++)
			for(int t2 = 0; t2 < m; t2++)
				cin >> c[t1][t2];
		for(i = 0; i < n; i++){
			for(j = 0; j < m; j++){
				if(c[i][j] == '1'){
					area(i, j);
					ans = max(ans, temp);
					temp = 0;
				//cout << ans << endl;
				}
			}
		}
		cout << ans << endl;
		for(int i = 0; i < 11; i++){
			for(int j = 0; j < 11; j++){
				c[i][j] = 0;
				note[i][j] = 0;
			}
		}
	}
	return 0;
}
