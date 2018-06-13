#include<bits/stdc++.h>

using namespace std;
int arr[50][50];
int n, m, tot = 0, men = 0;
//int xx[] = {0, -1, -1, -1, 0, 1, 1, 1};
//int yy[] = {-1, -1, 0, 1, 1, 1, 0, -1};
int xx[] = {0, -1, 1, 0};
int yy[] = {-1, 0, 0, 1};
bool vis[50][50], sol[50][50], loh[500][500];

inline bool ok(int x, int y){
	return (x >= 0 && y >= 0 && x < n && y < m);
}

void dfs(int num, int r_now, int c_now){
	vis[r_now][c_now] = 1; men++;
	for(int i = 0; i < 4; i++){
		for(int j = 0; j < 4; j++){
			int a = r_now + xx[i];
			int b = c_now + yy[i];
			if(ok(a, b) && (arr[a][b] == 1) && (vis[a][b] == 0)){
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
					if(men > 2) tot += 1;
					men = 0;
				}
			}
		}printf("%d\n", tot);
		for(int i = 0; i < n; i++){
			for(int j = 0; j < m; j++){
				if(!sol[i][j] && arr[i][j] == 1){ // you mikir from here
					sol[i][j] == 1;
					for(int q = 0; q < 4; q++){
							int a = i + xx[q];
							int b = j + yy[q];
							if(ok(a, b) && arr[a][b] == 1){
								int aaa = (i * 10) + j;
								int bbb = (a * 10) + b;
								if(!loh[aaa][bbb] && !loh[bbb][aaa]){
									tot++; loh[aaa][bbb] = 1; loh[aaa][bbb] = 1;
									//printf("%d %d\n", i, j);
								}
							}
					}
				} // too heapwalk
			}
		}
		
		printf("%d\n", tot);
	}
	return 0;
}