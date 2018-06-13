////////////////////////////////////////////////
//                                            //
//  Author: Muhammad Faishol Amirul Mukminin  //
//                                            //
////////////////////////////////////////////////
#include <bits/stdc++.h>
using namespace std;

typedef long long ll;
typedef unsigned long long ull;
typedef pair<int,int> pi;
typedef pair<pi,int> pii;
typedef pair<ll,ll> pl;
typedef pair<pl,ll> pll;
typedef pair<double,double> pd;
typedef pair<pd,double> pdd;

#define FOR(i,x,y) for(int i=(x);i<(y);i++)
#define FORN(i,x,y) for(int i=(x);i<=(y);i++)
#define REV(i,a,b) for(int i=(a);i>(b);i--)
#define REVN(i,a,b) for(int i=(a);i>=(b);i--)

#define fi first
#define se second
#define PUB push_back
#define POB pop_back
#define PUF push_front
#define POF pop_front
#define ALL(v) (v).begin(),(v).end()
#define endl "\n"

const double EPS = 1e-9;
const double PI = acos(-1);
const ll MOD = 1e9+7;
const int INF = 0x7FFFFFFF;
const ll LINF = 0x7FFFFFFFFFFFFFFFLL;
const ull UINF = 0xFFFFFFFFFFFFFFFFLL;
const int dCol[] = {0,+1,0,-1,+1,+1,-1,-1};
const int dRow[] = {-1,0,+1,0,-1,+1,+1,-1};

template <typename T>
inline void VIN(vector<T> &i){ T x; cin >> x; i.PUB(x); }

int T, N, M, ans=0;
int maze[15][15];
bool isVisited[15][15];

int floodfill(int pR, int pC){
	isVisited[pR][pC] = 1;
	int tmp=0;
	FOR(i,0,8){
		int tC = pC+dCol[i],
			tR = pR+dRow[i];

		if(0 <= tC && tC < M && 0 <= tR && tR < N){
			if(!isVisited[tR][tC] && maze[tR][tC]==1)
				tmp += floodfill(tR,tC);
		}
	}

	return tmp+1;
}

int main(){
	ios_base::sync_with_stdio(false); cin.tie(0); cout.tie(0);
		
	cin >> T;
	while(T--){
		memset(isVisited,0,sizeof isVisited);
		ans = 0;

		cin >> N >> M;
		FOR(i,0,N) FOR(j,0,M) cin >> maze[i][j];

		FOR(i,0,N) FOR(j,0,M)
			if(maze[i][j]==1 && !isVisited[i][j]){
				ans = max(ans, floodfill(i,j));
			}

		cout << ans << endl;
	}	
			
	return 0;
}