#include<bits/stdc++.h>
#define ll long long
#define mp make_pair
#define sc second
#define fs first
#define pb push_back
using namespace std;

string suff[105];
map<string, pair<int,int> > sim; 
string s;
vector<pair<int,int> > sampai[105];
int depe[105][105][105];

int dp(int now,int kiri,int kanan){
	if(now == s.length()){
		return 0;
	}
	int &ret = depe[now][kiri][kanan];
	if(ret != -1) return ret;
	
	ret = 1000000000;
	if(binary_search(sampai[now].begin(), sampai[now].end(), mp(kiri,kanan))){
		ret = min(ret, dp(now + kanan - kiri + 1, kiri, kanan) + 1);
	}
	ret = min(ret, dp(now + 1, kiri, kanan) + 1);
	
	for(int i = 0; i < sampai[now].size(); i++){
	//	if(now == 3){
	//		cout << sampai[now][i].fs << " " << sampai[now][i].sc << "asem\n";
	//	}
	//	if(now == 3 && kiri == 2 && kanan == 1 && sampai[now][i].fs == 0 && sampai[now][i].sc == 2) cout << "ini \n";
		ret = min(ret, dp(now + sampai[now][i].sc - sampai[now][i].fs + 1, sampai[now][i].fs, sampai[now][i].sc) + 2);
	}
//	if(now == 6 && kiri == 0 && kanan == 2 ) cout << ret << "  asu\n";
//	cout << now << " " << kiri << " " << kanan << " " << ret << "\n";
	return ret;
}

int main(){
	int t; cin >> t;
	for(int i = 0; i < t; i++){
		cin >> s;
		memset(depe,-1,sizeof(depe));
		sim.clear();
		for(int j = 0; j <= 100; j++){
			sampai[j].clear();
		}
		
		for(int j = 0; j < s.length() - 1; j++){
			char now = s[j];
			for(int k = 0; k < j; k++){
				suff[k] = suff[k] + now;
				if(!sim.count(suff[k])) sim[suff[k]] = mp(k,j);
			}
			suff[j] = now;
			if(!sim.count(suff[j])) sim[suff[j]] = mp(j,j);
			string bawa = "";
			for(int k = j + 1; k < s.length(); k++){
				bawa = bawa + s[k];
				if(sim.count(bawa)){
			//		if(j == 2) cout << sim[bawa].fs << " " << sim[bawa].sc << "\n";
					sampai[j + 1].pb(sim[bawa]);
				}
			}
			sort(sampai[j + 1].begin(), sampai[j + 1].end());
		}
		cout << dp(0, 2, 1) << "\n"; 
	}	
}
