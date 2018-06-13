#include<bits/stdc++.h>

using namespace std;
int arr[12][12];
int n, m, tot = 0, men = 0;
int xx[] = {0, -1, -1, -1, 0, 1, 1, 1};
int yy[] = {-1, -1, 0, 1, 1, 1, 0, -1}; 
bool vis[12][12];

inline bool ok(int x, int y){
	return (x >= 0 && y >= 0 && x < n && y < m);
}

void dfs(int num, int r_now, int c_now){
	vis[r_now][c_now] = 1;
	for(int i = 0; i < 8; i++){
		for(int j = 0; j < 8; j++){
			int a = r_now + xx[i];
			int b = c_now + yy[i];
			if(ok(a, b) && (arr[a][b] == 1) && (vis[a][b] == 0)){
				men++;
				dfs(arr[a][b], a, b);
			}
		}
	}
}

int main(){
	int tc; scanf("%d", &tc);
	while(tc--){
		tot = 0; men = 0;
		memset(vis, 0, sizeof vis);
		scanf("%d %d", &n, &m);
		for(int i = 0; i < n; i++){
			for(int j = 0; j < m; j++){
				scanf("%d", &arr[i][j]);
			}
		}
		for(int i = 0; i < n; i++){
			for(int j = 0; j < m; j++){
				if(!vis[i][j] && arr[i][j] == 1){
					dfs(arr[i][j], i, j);
					tot += men;
					if(men != 0) tot++;
					men = 0;
				}
			}
		}
		printf("%d\n", tot);
	}
	return 0;
}