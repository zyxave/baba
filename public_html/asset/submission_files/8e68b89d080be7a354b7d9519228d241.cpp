#include <bits/stdc++.h>

using namespace std;

bool pairCompare(const std::pair<int, int>& firstElem, const std::pair<int, int>& secondElem) {
  return firstElem.first < secondElem.first;

}

void f()
{
	int n;
	cin>>n;
	vector<string> s;
	vector< pair<int,int> > i;
	int m=n;
	pair<int,int> x[n];
	while(m--)
	{
		string tmp;
		cin>>tmp;
		pair<int,int> tap;
		tap.second=m;
		int h=0;
		while(h<tmp.length())
		{
			tap.first+=tmp[h]-'0';
			h++;
		}
		s.push_back(tmp);
		i.push_back(tap);
	}
	sort(i.begin(),i.end(),pairCompare);
	while(n--)
	{/*
		string data = s[n];
	    stringstream sstream(data);
	    string output;
	    while(sstream.good())
	    {
	        bitset<8> bits;
	        sstream >> bits;
	        char c = char(bits.to_ulong());
	        output += c;
	    }*/
		cout<<s[i[n].second]<<endl;
	}
}

int main()
{
	int t;
	cin>>t;
	while(t--)
		f();
}
