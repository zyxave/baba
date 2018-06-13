#include<bits/stdc++.h>
#define fs first
#define sc second
#define mp make_pair
#define pb push_back
#define pii pair<int,int>
#define mod 1000000007
using namespace std;

/*inline void scan(int* p) {
    static char c;
    while ((c = getchar_unlocked()) < '0');
    for (*p = c-'0'; (c = getchar_unlocked()) >= '0'; *p = *p*10+c-'0');
}*/

int xx[] = {0,0,1,1,1,-1,-1,-1};
int yy[] = {1,-1,0,1,-1,0,1,-1};
int t,n,m;
int blok[15][15];
bool visit[15][15];

bool valid(int x,int y){
	return (x >= 0 && x < n && y >= 0 && y < m);
}

int main(){
	cin >> t;
	
	for(int x = 0; x < t; x++){
		cin >> n >> m;
		
		memset(visit,false,sizeof(visit));
		for(int i = 0; i < n; i++){
			for(int j = 0; j < m; j++){
				cin >> blok[i][j];
			}
		}
		
		int ans = 0;
		for(int i = 0; i < n; i++){
			for(int j = 0; j < m; j++){
				queue<pair<int,int> > bfs;
				if(visit[i][j] || blok[i][j] == 0) continue;
				int cnt = 1;
				visit[i][j] = true;
				bfs.push(mp(i,j));
				while(!bfs.empty()){
					pair<int,int> now = bfs.front();
					bfs.pop();
					for(int k = 0; k < 4; k++){
						int nowx = now.fs + xx[k];
						int nowy = now.sc + yy[k];
						if(blok[nowx][nowy] == 1 && !visit[nowx][nowy]){
							cnt++;
							visit[nowx][nowy] = true;
							bfs.push(mp(nowx,nowy));
						}
					}
				}
				ans = max(ans,cnt);
			}
		}
		
		cout << ans;
	}
}



