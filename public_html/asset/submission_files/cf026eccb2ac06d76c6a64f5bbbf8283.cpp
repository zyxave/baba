#include<bits/stdc++.h>

using namespace std;
#define ll long long
#define MOD 1000000007

vector<int> ve[100005];

int main(){
	int t; cin >> t;
	
	for(int i = 0 ; i < t; i++){
		for(int j = 1; j <= 100000; j++){
			ve[j].clear();
		}
		int n; cin >> n;
		for(int j = 0; j < n; j++){
			int a,b; cin >> a >> b;
			ve[a].push_back(b);
		}
		for(int j = 1; j <= 100000;j++){
			sort(ve[j].begin(), ve[j].end());
		}
		int jawab = 0;
		for(int j = 1; j <= 100000; j++){
			int cnt = 0;
			for(int k = 0; k < ve[j].size(); k++){
				if(k == 0 || ve[j][k] == ve[j][k - 1] ){
					cnt++;
				}else{
					int now = ve[j][k - 1];
					int nyak = upper_bound(ve[now].begin(), ve[now].end(), j) - lower_bound(ve[now].begin(), ve[now].end(), j);
					jawab += min(nyak, cnt);
					cnt = 1;
				}
			}
			if(ve[j].empty()) continue;
			int now = ve[j][ve[j].size() - 1];
			int nyak = upper_bound(ve[now].begin(), ve[now].end(), j) - lower_bound(ve[now].begin(), ve[now].end(), j);
			jawab += min(nyak, cnt);
		}
		cout << jawab << "\n";
	}
}
