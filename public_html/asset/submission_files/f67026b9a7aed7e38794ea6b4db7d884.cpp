#include<bits/stdc++.h>
using namespace std;
vector<int> vec;
int main()
{
	int t; cin >> t;
	while(t--)
	{
		vec.clear();
		int n; cin >> n;
		int money; cin >> money;
		for(int i = 1; i <= n; i++)
		{
			int x; cin >> x;
			vec.push_back(x);
		}
		sort(vec.begin(), vec.end());
		if(vec[0]+vec[1] > money) cout << "Billy rapopo\n";
		else cout << vec[0] << " " << vec[1] << "\n";
	}
}
