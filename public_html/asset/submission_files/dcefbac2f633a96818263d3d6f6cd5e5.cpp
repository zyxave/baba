#include<bits/stdc++.h>
using namespace std;
int main(){
	int t,n,m,a;
	cin>>t;
	while(t--){
		vector<int>ve;
		cin>>n>>m;
		bool c;
		if(m%2 == 0){
			c = true;
		}
		int x = 0;
		for(int i=0;i<n;i++){
			cin>>a;
			if(c && a == m / 2){
				x++;
			}
			ve.push_back(a);
		}
		if(x >= 2){
			cout << m/2 << " " << m / 2 << "\n";
			continue;
		}
		sort(ve.begin(),ve.end());
		int jaw = -1;
		for(int i=0;i<n;i++){
			int satu=ve[i];
			if(satu >= m - satu){
				break;
			}
			int cari=lower_bound(ve.begin(),ve.end(),m-satu) - ve.begin();
			if(ve[cari] != m - satu){
				continue;
			}else{
				jaw = satu;
			}
		}
		if(jaw != -1){
			cout << jaw << " " << m - jaw << "\n";
		}else{
			cout << "Billy rapopo\n";
		}
	}
}
