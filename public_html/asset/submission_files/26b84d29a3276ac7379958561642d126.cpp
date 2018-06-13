#include<bits/stdc++.h>
#define ll long long
using namespace std;
set<int>ver,hor,ph,pv;
set<int>::iterator lo,hi;
int t,n,m,q,x,y;
int ch[100003],cv[100003];

bool udah[1005];
int cnt;
map<string,int> haha;

int main(){
	int t; cin >> t;
	
	for(int i = 0 ; i < t; i ++){
		memset(udah,false,sizeof(udah));
		haha.clear();
		int q; cin >> q;
		string asu;
		getline(cin,asu);
		cout<<asu<<endl;
		for(int j = 0; j < q; j++){
			string ss; getline(cin,ss);
		//	cout<<ss<<endl;
			if(!haha.count(ss)){
				haha[ss] = j + 1;
			}
		}
		int s; cin >> s;
	//	cout<<s<<endl;
		getline(cin,asu);
		cnt = 0;
		int jawab = 0;
		for(int j = 0 ; j < s; j++){
			string baca; getline(cin,baca);
			if(haha.count(baca)){
				if(!udah[haha[baca]]){
					cnt++;
				}
				udah[haha[baca]] = true;
			}
			if(cnt == q){
				jawab = jawab + 1;
				memset(udah,false,sizeof(udah));
				cnt = 0;
			}
		}
		cout << jawab << "\n";
	}
	
}
