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

int T, P, Q;
vector<ull>binom[26];

ull modexp(ull b, ull e){
	ull r = 1;
	while(e>0){
		if(e&1) r = r*b;

		e>>=1;
		b=b*b;
	}

	return r;
}

int main(){
	ios_base::sync_with_stdio(false); cin.tie(0); cout.tie(0);
	
	FORN(i,0,25) FORN(j,0,i){
		if(i==j || j==0) binom[i].PUB(1);
		else binom[i].PUB(binom[i-1][j]+binom[i-1][j-1]);
	}

	cin >> T;
	while(T--){
		cin >> P >> Q;

		REVN(i,Q,0){
			ull tmp = binom[Q][i]*modexp(P,Q-i);
			
			if(tmp==1){
				if(i==0) cout << tmp;
			}else cout << tmp;
			
			if(i!=0){
				cout << "x";
				
				if(i!=1) cout << i;

				cout << " ";
			}
		}

		cout << endl;
	}
			
	return 0;
}